<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Lang;
//use Illuminate\Contracts\Auth\Guard;
use UiStacks\Uiquiz\Models\Topic;
use UiStacks\Uiquiz\Models\Question;
use UiStacks\Uiquiz\Models\QuestionsOption;
use UiStacks\Uiquiz\Models\Quiz;
use UiStacks\Uiquiz\Models\QuizTrans;
use UiStacks\Uiquiz\Models\Answer;
use UiStacks\Uiquiz\Models\AnswerTrans;
use DB;

class QuizController extends Controller
{
//    public function __construct(Guard $auth)
//    {
//        $this->auth = $auth;
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$slug = null)
    {
        //get all active questions from table
        $topic = Topic::where('slug',$slug)->first();
        $items = Question::where('topic_id',$topic->id)->get();
//        $items = Question::where('topic_id',$topic->id)->orderBy(DB::raw('RAND()'))->take(1)->get();
        $questions = Question::where('topic_id',$topic->id)->inRandomOrder()->get();
        foreach ($questions as &$question) {
            $question->options = QuestionsOption::where('question_id', $question->id)->inRandomOrder()->get();
        }
//        dd($items);
        return view('website.quiz.index', compact('items','questions'));

    }

    public function quiz(Request $request)
    {
        return view('website.quiz.index', compact('items'));
    }

    public function submitQuiz(Request $request)
    {
//        dd($request);

        $result = 0;
        $quiz = new Quiz();
        $quiz->user_id = Auth::user()->id;
        $quiz->save();

        $quizTrans = new QuizTrans();
        $quizTrans->quize_id = $quiz->id;
        $quizTrans->result = $result;
        $quizTrans->lang = Lang::getLocale();
        $quizTrans->save();

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;
            if ($request->input('answers.'.$question) != null
                && QuestionsOption::find($request->input('answers.'.$question))->trans->correct
            ) {
                $status = 1;
                $result++;
            }
            /*TestAnswer::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),
                'correct'     => $status,
            ]);*/
            $answer = new Answer();
            $answer->quize_id = $quiz->id;
            $answer->user_id = Auth::user()->id;
            $answer->question_id = $question;
            $answer->save();

            $answerTrans = new AnswerTrans();
            $answerTrans->answer_id = $answer->id;
            $answerTrans->option_id = $request->input('answers.'.$question);
            $answerTrans->correct = $status;
            $answerTrans->lang = Lang::getLocale();
            $answerTrans->save();
        }
        $quizTrans->result = $result;
        $quizTrans->save();
//        $test->update(['result' => $result]);

//        return redirect()->route('results.show', [$test->id]);
        \Session::flash('alert-class', 'alert-success');
        $successMsg = 'You have submitted your test, now wait for result!';
        \Session::flash('message', $successMsg);
        return redirect(action('QuizController@quizResult'));
    }

    public function quizResult(Request $request)
    {
        $items = Question::where('topic_id',1)->get();
        return view('website.quiz.results', compact('items'));
    }

}
