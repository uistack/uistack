<div class="cb-footer">
    <div class="cb-container">
        <div class="cb-footer-container">
            <a href="{{ action('CmsController@showPage','privacy') }}" target="_blank" class="cn-footer-link">Privacy</a>
            <a href="{{ action('CmsController@showPage','terms') }}" target="_blank" class="cn-footer-link">Terms</a>
            <a href="{{ action("WebsiteController@createContact")}}" target="_blank" class="cn-footer-link">Help</a>
        </div>
    </div>
</div>
<style>
    /*.cb-footer{*/
        /*padding: 30px 0;*/
    /*}*/
    .cb-footer .cb-container{
        max-width: none;
    }
    .cn-footer-link{
        color: #bbb;
        margin-left: 15px;
    }
</style>