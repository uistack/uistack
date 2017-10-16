/*/assets/swiftype/javascripts/jquery.ba-hashchange.min.js*/
(function($,e,b){var c="hashchange",h=document,f,g=$.event.special,i=h.documentMode,d="on"+c in e&&(i===b||i>7);function a(k){k=k||location.href;var j=k.indexOf("#");return j===-1?"#":k.substr(j);}$.fn[c]=function(j){return j?this.bind(c,j):this.trigger(c);};$.fn[c].delay=50;g[c]=$.extend(g[c],{setup:function(){if(d){return false;}$(f.start);},teardown:function(){if(d){return false;}$(f.stop);}});f=(function(){var j={},p,m=a(),k=function(q){return q;},l=k,o=k;j.start=function(){p||n();};j.stop=function(){p&&clearTimeout(p);p=b;};function n(){var r=a(),q=o(m);if(r!==m){l(m=r,q);$(e).trigger(c);}else{if(q!==m){location.href=location.href.replace(/#.*/,"")+q;}}p=setTimeout(n,$.fn[c].delay);}e.attachEvent&&!e.addEventListener&&!d&&(function(){var q,r;j.start=function(){if(!q){r=$.fn[c].src;r=r&&r+a();q=$('<iframe tabindex="-1" title="empty"/>').hide().one("load",function(){r||l(a());n();}).attr("src",r||"javascript:0").insertAfter("body")[0].contentWindow;h.onpropertychange=function(){try{if(event.propertyName==="title"){q.document.title=h.title;}}catch(s){}};}};j.stop=k;o=function(){return a(q.location.href);};l=function(v,s){var u=q.document,t=$.fn[c].domain;if(v!==s){u.title=h.title;u.open();t&&u.write('<script>document.domain="'+t+'"<\/script>');u.close();q.location.hash=v;}};})();return j;})();})(jQuery,this);
/*/assets/swiftype/javascripts/jquery.swiftype.autocomplete.js*/
(function(e){var k=function(r){var s,t,q={};if(r===""){return{};}for(s=0;s<r.length;s+=1){t=r[s].split("=");if(t.length===2){q[t[0]]=decodeURIComponent(t[1].replace(/\+/g," "));}}return q;};e.queryParams=function(){return k(window.location.search.substr(1).split("&"));};e.hashParams=function(){return k(window.location.hash.substr(1).split("&"));};var f=0;window.Swiftype=window.Swiftype||{};Swiftype.root_url=Swiftype.root_url||"https://api.swiftype.com";Swiftype.pingUrl=function(q,s){var r=setTimeout(s,350);var p=new Image();p.onload=p.onerror=function(){clearTimeout(r);s();};p.src=q;return false;};Swiftype.pingAutoSelection=function(r,q,s,u){var t={t:new Date().getTime(),engine_key:r,doc_id:q,prefix:s};var p=Swiftype.root_url+"/api/v1/public/analytics/pas?"+e.param(t);Swiftype.pingUrl(p,u);};Swiftype.findSelectedSection=function(){var q=e.hashParams().sts;if(!q){return;}function p(s){var r=s.replace(/\s+/g,"");r=r.toLowerCase();return r;}q=p(q);e("h1, h2, h3, h4, h5, h6").each(function(r){$this=e(this);if(p($this.text()).indexOf(q)>=0){this.scrollIntoView(true);return false;}});};Swiftype.htmlEscape=Swiftype.htmlEscape||function o(p){return String(p).replace(/&/g,"&amp;").replace(/"/g,"&quot;").replace(/'/g,"&#39;").replace(/</g,"&lt;").replace(/>/g,"&gt;");};e.fn.swiftype=function(p){Swiftype.findSelectedSection();var p=e.extend({},e.fn.swiftype.defaults,p);return this.each(function(){var w=e(this);var s=e.meta?e.extend({},p,w.data()):p;w.attr("autocomplete","off");w.data("swiftype-config-autocomplete",s);w.submitted=false;w.cache=new j(10);w.emptyQueries=[];w.isEmpty=function(A){return e.inArray(g(A),this.emptyQueries)>=0;};w.addEmpty=function(A){w.emptyQueries.unshift(g(A));};var z=s.dropdownStylesFunction(w);var r=e('<div class="swiftype-widget" />');var u=e("<div />").addClass(s.suggestionListClass).appendTo(r).css(z).hide();r.appendTo(s.autocompleteContainingElement);var v=e("<"+s.suggestionListType+" />").appendTo(u);w.data("swiftype-list",v);w.abortCurrent=function(){if(w.currentRequest){w.currentRequest.abort();}};w.showList=function(){if(n(s.disableAutocomplete)===false){u.show();}};w.hideList=function(A){if(A){u.hide();}else{setTimeout(function(){u.hide();},10);}};w.focused=function(){return w.is(":focus");};w.submitting=function(){w.submitted=true;};w.listResults=function(){return e(s.resultListSelector,v);};w.activeResult=function(){return w.listResults().filter("."+s.activeItemClass).first();};w.prevResult=function(){var D=w.listResults(),B=D.index(w.activeResult()),C=B-1,A=D.eq(C);w.listResults().removeClass(s.activeItemClass);if(C>=0){A.addClass(s.activeItemClass);}};w.nextResult=function(){var D=w.listResults(),B=D.index(w.activeResult()),C=B+1,A=D.eq(C);w.listResults().removeClass(s.activeItemClass);if(C>=0){A.addClass(s.activeItemClass);}};w.selectedCallback=function(A){return function(){var B=w.val(),C=function(){s.onComplete(A,B);};Swiftype.pingAutoSelection(s.engineKey,A.id,B,C);};};w.registerResult=function(A,B){A.data("swiftype-item",B);A.click(w.selectedCallback(B)).mouseover(function(){w.listResults().removeClass(s.activeItemClass);A.addClass(s.activeItemClass);});};w.getContext=function(){return{config:s,list:v,registerResult:w.registerResult};};var x;var q=false;w.lastValue="";w.keyup(function(A){if(q){q=false;return;}if(((A.which>36)&&(A.which<41))||(A.which==16)){return;}if(s.typingDelay>0){clearTimeout(x);x=setTimeout(function(){m(w);},s.typingDelay);}else{m(w);}});w.styleDropdown=function(){u.css(s.dropdownStylesFunction(w));};e(window).resize(function(A){w.styleDropdown();});w.keydown(function(B){w.styleDropdown();var A=w.activeResult();switch(B.which){case 13:if((A.length!==0)&&(v.is(":visible"))){B.preventDefault();w.selectedCallback(A.data("swiftype-item"))();}else{if(w.currentRequest){w.submitting();}}w.hideList();q=true;break;case 38:B.preventDefault();if(A.length===0){w.listResults().last().addClass(s.activeItemClass);}else{w.prevResult();}break;case 40:B.preventDefault();if(A.length===0){w.listResults().first().addClass(s.activeItemClass);}else{if(A!=w.listResults().last()){w.nextResult();}}break;case 27:w.hideList();q=true;break;default:w.submitted=false;break;}});w.keypress(function(A){if((A.which==13)&&(w.activeResult().length>0)){A.preventDefault();}});var t=false;var y=false;e(document).bind("mousedown.swiftype"+ ++f,function(){t=true;});e(document).bind("mouseup.swiftype"+f,function(){t=false;if(y){y=false;w.hideList();}});w.blur(function(){if(t){y=true;}else{w.hideList();}});w.focus(function(){setTimeout(function(){w.select();},10);if(w.listResults().filter(":not(."+s.noResultsClass+")").length>0){w.showList();}});});};var g=function(p){return e.trim(p).toLowerCase();};var a=function(r,q){r.abortCurrent();var t={},p=r.data("swiftype-config-autocomplete");t.q=q;t.engine_key=p.engineKey;t.search_fields=n(p.searchFields);t.fetch_fields=n(p.fetchFields);t.filters=n(p.filters);t.document_types=n(p.documentTypes);t.functional_boosts=n(p.functionalBoosts);t.sort_field=n(p.sortField);t.sort_direction=n(p.sortDirection);t.per_page=p.resultLimit;var s=Swiftype.root_url+"/api/v1/public/engines/suggest.json";r.currentRequest=e.ajax({type:"GET",dataType:"jsonp",url:s,data:t}).success(function(v){var u=g(q);if(v.record_count>0){r.cache.put(u,v.records);}else{r.addEmpty(u);r.data("swiftype-list").empty();r.hideList();return;}l(r,v.records,q);});};var b=function(s,q){var p=g(q);if(s.isEmpty(p)){s.data("swiftype-list").empty();s.hideList();return;}var r=s.cache.get(p);if(r){l(s,r,q);}else{a(s,q);}};var m=function(q){var p=q.val();if(p===q.lastValue){return;}q.lastValue=p;if(e.trim(p)===""){q.data("swiftype-list").empty();q.hideList();return;}if(typeof q.data("swiftype-config-autocomplete").engineKey!=="undefined"){b(q,p);}};var l=function(u,s,r){var q=u.data("swiftype-list"),p=u.data("swiftype-config-autocomplete");q.empty();u.hideList(true);p.resultRenderFunction(u.getContext(),s);var t=u.listResults().length;if((t>0&&u.focused())||(p.noResultsMessage!==undefined)){if(u.submitted){u.submitted=false;}else{u.showList();}}};var d=function(p,s){var r=p.list,q=p.config;e.each(s,function(u,t){e.each(t,function(v,w){p.registerResult(e("<li>"+q.renderFunction(u,w)+"</li>").appendTo(r),w);});});};var i=function(p,q){return'<p class="title">'+Swiftype.htmlEscape(q.title)+"</p>";};var h=function(p,q){window.location=p.url;};var c=function(s){var p=s.data("swiftype-config-autocomplete");var r=p.attachTo?e(p.attachTo):s;var t=r.offset();var q={position:"absolute","z-index":9999,top:t.top+r.outerHeight()+1,left:t.left};if(p.setWidth){q.width=r.outerWidth()-2;}return q;};var n=function(q){if(q!==undefined){var p=q;if(typeof p==="function"){p=p.call();}return p;}return undefined;};function j(p){this.size=0;this.limit=p;this._keymap={};}j.prototype.put=function(p,r){var q={key:p,value:r};this._keymap[p]=q;if(this.tail){this.tail.newer=q;q.older=this.tail;}else{this.head=q;}this.tail=q;if(this.size===this.limit){return this.shift();}else{this.size++;}};j.prototype.shift=function(){var p=this.head;if(p){if(this.head.newer){this.head=this.head.newer;this.head.older=undefined;}else{this.head=undefined;}p.newer=p.older=undefined;delete this._keymap[p.key];}return p;};j.prototype.get=function(q,p){var r=this._keymap[q];if(r===undefined){return;}if(r===this.tail){return r.value;}if(r.newer){if(r===this.head){this.head=r.newer;}r.newer.older=r.older;}if(r.older){r.older.newer=r.newer;}r.newer=undefined;r.older=this.tail;if(this.tail){this.tail.newer=r;}this.tail=r;return p?r:r.value;};j.prototype.remove=function(p){var q=this._keymap[p];if(!q){return;}delete this._keymap[q.key];if(q.newer&&q.older){q.older.newer=q.newer;q.newer.older=q.older;}else{if(q.newer){q.newer.older=undefined;this.head=q.newer;}else{if(q.older){q.older.newer=undefined;this.tail=q.older;}else{this.head=this.tail=undefined;}}}this.size--;return q.value;};j.prototype.clear=function(){this.head=this.tail=undefined;this.size=0;this._keymap={};};if(typeof Object.keys==="function"){j.prototype.keys=function(){return Object.keys(this._keymap);};}else{j.prototype.keys=function(){var q=[];for(var p in this._keymap){q.push(p);}return q;};}e.fn.swiftype.defaults={activeItemClass:"active",attachTo:undefined,documentTypes:undefined,filters:undefined,engineKey:undefined,searchFields:undefined,functionalBoosts:undefined,sortField:undefined,sortDirection:undefined,fetchFields:undefined,noResultsClass:"noResults",noResultsMessage:undefined,onComplete:h,resultRenderFunction:d,renderFunction:i,dropdownStylesFunction:c,resultLimit:undefined,suggestionListType:"ul",suggestionListClass:"autocomplete",resultListSelector:"li",setWidth:true,typingDelay:80,disableAutocomplete:false,autocompleteContainingElement:"body"};})(jQuery);
/*/assets/swiftype/javascripts/jquery.swiftype.search.js*/
(function ($) {
    var queryParser = function (a) {
        var i, p, b = {};
        if (a === "") {
            return {};
        }
        for (i = 0; i < a.length; i += 1) {
            p = a[i].split('=');
            if (p.length === 2) {
                b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
            }
        }
        return b;
    };
    $.queryParams = function () {
        return queryParser(window.location.search.substr(1).split('&'));
    };
    $.hashParams = function () {
        return queryParser(window.location.hash.substr(1).split('&'));
    };


    window.Swiftype = window.Swiftype || {};
    Swiftype.root_url = Swiftype.root_url || 'https://api.swiftype.com';
    Swiftype.pingUrl = function(endpoint, callback) {
        var to = setTimeout(callback, 350);
        var img = new Image();
        img.onload = img.onerror = function() {
            clearTimeout(to);
            callback();
        };
        img.src = endpoint;
        return false;
    };
    Swiftype.pingSearchResultClick = function (engineKey, docId, callback) {
        var params = {
            t: new Date().getTime(),
            engine_key: engineKey,
            doc_id: docId,
            q: Swiftype.currentQuery
        };
        var url = Swiftype.root_url + '/api/v1/public/analytics/pc?' + $.param(params);
        Swiftype.pingUrl(url, callback);
    };

    $.fn.swiftypeSearch = function (options) {
        var options = $.extend({}, $.fn.swiftypeSearch.defaults, options);

        return this.each(function () {
            var $this = $(this);
            var config = $.meta ? $.extend({}, options, $this.data()) : options;
            $this.data('swiftype-config-search', config);

            $this.selectedCallback = function (data) {
                return function (e) {
                    var $el = $(this);
                    e.preventDefault();
                    Swiftype.pingSearchResultClick(config.engineKey, data['id'], function() {
                        window.location = $el.attr('href');
                    });
                };
            };

            $this.registerResult = function ($element, data) {
                $element.data('swiftype-item', data);
                $('a', $element).click($this.selectedCallback(data));
            };

            $this.getContentCache = function () {
                return $('#' + contentCacheId);
            };

            var $resultContainer = $(config.resultContainingElement),
                initialContentOfResultContainer = $resultContainer.html(),
                contentCacheId = 'st-content-cache',
                $contentCache = $this.getContentCache();

            var setSearchHash = function (query, page) {
                var hash = "stq=" + encodeURIComponent(query) + "&stp=" + page;

                if(typeof config.addExtraHashFunction !== 'undefined' && typeof config.addExtraHashFunction === 'function'){
                    var extraHash = config.addExtraHashFunction.call(this);
                    if(typeof extraHash !== 'undefined' && extraHash !==''){
                        hash+='&'+extraHash;
                    }
                }
                if(! (query.trim() === ''))
                    location.hash = hash;
            };

            var submitSearch = function (query, options) {
                options = $.extend({
                    page: 1
                }, options);
                var params = {};

                if (!$contentCache.length) {
                    $resultContainer.after("<div id='" + contentCacheId + "' style='display: none;'></div>");
                    $contentCache.html(initialContentOfResultContainer).hide();
                }
                config.loadingFunction(query, $resultContainer);

                Swiftype.currentQuery = query;
                params['q'] = query;
                params['engine_key'] = config.engineKey;
                params['page'] = options.page;
                params['per_page'] = config.perPage;

                function handleFunctionParam(field) {
                    if (field !== undefined) {
                        var evald = field;
                        if (typeof evald === 'function') {
                            evald = evald.call();
                        }
                        return evald;
                    }
                    return undefined;
                }

                params['search_fields'] = handleFunctionParam(config.searchFields);
                params['fetch_fields'] = handleFunctionParam(config.fetchFields);
                params['facets'] = handleFunctionParam(config.facets);
                params['filters'] = handleFunctionParam(config.filters);
                params['document_types'] = handleFunctionParam(config.documentTypes);
                params['functional_boosts'] = handleFunctionParam(config.functionalBoosts);
                params['sort_field'] = handleFunctionParam(config.sortField);
                params['sort_direction'] = handleFunctionParam(config.sortDirection);
                params['spelling'] = handleFunctionParam(config.spelling);

                var resultPromise = $.getJSON(Swiftype.root_url + "/api/v1/public/engines/search.json?callback=?", params).success(renderSearchResults);
                setTimeout(
                    function() {
                        if (resultPromise.state() !== 'resolved') {
                            resultPromise.abort();
                            defErrorHandler('timeout', config); }
                    },
                    config.requestTimeout);

            };

            $(window).hashchange(function (e) {
                var params = $.hashParams();
                if(typeof config !== 'undefined'  && typeof config.hashHandlerFunction === 'function'){
                    config.hashHandlerFunction.call(this, params, options);
                }
                if (params.stq) {
                    submitSearch(params.stq, {
                        page: params.stp
                    });
                } else {
                    var $contentCache = $this.getContentCache();
                    if ($contentCache.length) {
                        $resultContainer.html($contentCache.html());
                        $contentCache.remove();
                    }
                }
            });

            var $containingForm = $this.parents('form');
            if ($containingForm) {
                $containingForm.bind('submit', function (e) {
                    e.preventDefault();
                    var searchQuery = $this.val();
                    setSearchHash(searchQuery, 1);
                });
            }

            $(document).on('click', '[data-hash][data-page]', function (e) {
                e.preventDefault();
                var $this = $(this);
                setSearchHash($.hashParams().stq, $this.data('page'));
            });

            $(document).on('click', '[data-hash][data-spelling-suggestion]', function (e) {
                e.preventDefault();
                var $this = $(this);
                setSearchHash($this.data('spelling-suggestion'), 1);
            });

            var renderSearchResults = function (data) {
                if (typeof config.preRenderFunction === 'function') {
                    config.preRenderFunction.call($this, data);
                }

                config.renderResultsFunction($this.getContext(), data);

                if (typeof config.postRenderFunction === 'function') {
                    config.postRenderFunction.call($this, data);
                }
            };

            $this.getContext = function () {
                return {
                    config: config,
                    resultContainer: $resultContainer,
                    registerResult: $this.registerResult
                };
            };

            $(window).hashchange(); // if the swiftype query hash is present onload (maybe the user is pressing the back button), submit a query onload
        });
    };

    var renderPagination = function (ctx, resultInfo) {
        var maxPagesType, maxPages = -1,
            config = ctx.config;
        $.each(resultInfo, function(documentType, typeInfo) {
            if (typeInfo.num_pages > maxPages) {
                maxPagesType = documentType;
                maxPages = typeInfo.num_pages;
            }
        });
        var currentPage = resultInfo[maxPagesType].current_page,
            totalPages = resultInfo[maxPagesType].num_pages;

        $(config.renderPaginationForType(maxPagesType, currentPage, totalPages)).appendTo(ctx.resultContainer);
    };


    var normalize = function (str) {
        return $.trim(str).toLowerCase();
    };

    function htmlEscape(str) {
        return String(str).replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/'/g, '&#39;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }

    var defaultRenderResultsFunction = function (ctx, data) {
        var $resultContainer = ctx.resultContainer,
            config = ctx.config;

        $resultContainer.html('');

        $.each(data.records, function (documentType, items) {
            $.each(items, function (idx, item) {
                ctx.registerResult($(config.renderFunction(documentType, item)).appendTo($resultContainer), item);
            });
        });

        renderPagination(ctx, data.info);
    };

    var defErrorHandler = function(error, c) {
        if (typeof c.handleRequestErrorFunction === 'function') {
            c.handleRequestErrorFunction(error, $(c.resultContainingElement));
        }
    };

    var defaultRenderFunction = function (document_type, item) {
        return '<div class="st-result"><h3 class="title"><a href="' + item['url'] + '" class="st-search-result-link">' + htmlEscape(item['title']) + '</a></h3></div>';
    };

    var defaultLoadingFunction = function(query, $resultContainer) {
        $resultContainer.html('<p class="st-loading-message">loading...</p>');
    };

    var defaultPostRenderFunction = function(data) {
        var totalResultCount = 0;
        var $resultContainer = this.getContext().resultContainer;
        var spellingSuggestion = null;

        if (data['info']) {
            $.each(data['info'], function(index, value) {
                totalResultCount += value['total_result_count'];
                if ( value['spelling_suggestion'] ) {
                    spellingSuggestion = value['spelling_suggestion']['text'];
                }

            });
        }

        if (totalResultCount === 0) {
            $resultContainer.html("<div id='st-no-results' class='st-no-results'>No results found.</div>");
        }

        if (spellingSuggestion !== null) {
            $resultContainer.append('<div class="st-spelling-suggestion">Did you mean <a href="#" data-hash="true" data-spelling-suggestion="' + spellingSuggestion + '">' + spellingSuggestion + '</a>?</div>');
        }
    };


    var defaultRenderPaginationForType = function (type, currentPage, totalPages) {
        var pages = '<div class="st-page">',
            previousPage, nextPage;
        if (currentPage != 1) {
            previousPage = currentPage - 1;
            pages = pages + '<a href="#" class="st-prev" data-hash="true" data-page="' + previousPage + '">&laquo; previous</a>';
        }
        if (currentPage < totalPages) {
            nextPage = currentPage + 1;
            pages = pages + '<a href="#" class="st-next" data-hash="true" data-page="' + nextPage + '">next &raquo;</a>';
        }
        pages += '</div>';
        return pages;
    };


    $.fn.swiftypeSearch.defaults = {
        attachTo: undefined,
        documentTypes: undefined,
        facets: undefined,
        filters: undefined,
        engineKey: undefined,
        searchFields: undefined,
        functionalBoosts: undefined,
        sortField: undefined,
        sortDirection: undefined,
        fetchFields: undefined,
        preRenderFunction: undefined,
        postRenderFunction: defaultPostRenderFunction,
        loadingFunction: defaultLoadingFunction,
        renderResultsFunction: defaultRenderResultsFunction,
        renderFunction: defaultRenderFunction,
        renderPaginationForType: defaultRenderPaginationForType,
        perPage: 10,
        spelling: 'strict',
        requestTimeout: 5000,
        handleRequestErrorFunction: undefined,
        hashHandlerFunction : undefined,
        addExtraHash : undefined
    };
})(jQuery);
/*/assets/swiftype/javascripts/swiftype-util.js*/
(function($) {
    "use strict";
    var SwiftSearch = function() {
        function SwiftSearch(options) {
            this.currentTab;
            this.isAjax;
            this.s = $.extend(true, defSetting(), options);
            this.initialize();
        }

        $.extend(SwiftSearch.prototype, {
            initialize: function() {
                var _this = this;
                /*
                 * checking for current tab using form attribute
                 */
                this.currentTab = $(this.s.formId).attr(this.s.tabTypeKey) || 'all';

                /*
                 * check if the page is swift result page
                 */
                this.isAjax = $(_this.s.formId).attr(_this.s.ajax);


                /*
                 * handling autoComplete on page load
                 */
                this.autoComplete();


                /*
                 *  Attaching Search to search box.
                 */
                var $rs = $(this.s.resultContainerId);
                if (typeof $rs !== 'undefined' && $rs.length > 0) {

                    $(this.s.formId).find(cusAttr(this.s.searchInpKey, 'input')).swiftypeSearch({
                        engineKey: this.s.engineKey,
                        filters: this.searchFilter(),
                        resultContainingElement: this.s.resultContainerId,
                        renderFunction: this.renderSearchResult(),
                        loadingFunction: this.renderLoadingSearch(),
                        handleRequestErrorFunction: this.renderSearchError(),
                        postRenderFunction: this.postRender(),
                        requestTimeout: 60000,
                        addExtraHashFunction: this.addExtraHash(),
                        hashHandlerFunction: this.hashHandler()
                    });

                    $rs.on('click', '.st-page a', function(e) {
                        $('html, body').animate({
                            scrollTop: $rs.offset().top - 200
                        }, 0);
                    });
                }


                /*
                 * binding event on form submit
                 */
                $(this.s.formId).on('submit', function(e) {
                    try {
                        var q = $(this).find(cusAttr(_this.s.searchInpKey, 'input')).val();

                        var type = $(_this.s.formId).attr(_this.s.tabTypeKey);

                        if (typeof q === 'undefined' || q.trim() === '') {// for empty search
                            $(_this.s.searchResultMsgId).hide();
                            $(_this.s.generalTopicsId).hide();
                            $rs.html('');
                            $(_this.s.noResultId).show();
                            $(this).find(cusAttr(_this.s.searchInpKey, 'input')).val('');
                            return false;
                        }
                        if (typeof _this.isAjax === 'undefined') {
                            location.href = _this.s.target + '#tab=' + type + '&stq=' + encodeURIComponent(q) + '&stp=1';
                        }

                    } finally {
                        e.preventDefault();
                    }
                });


                /*
                 * binding event on result tab.
                 */
                $(this.s.resultTabId).on('change', function(e) {
                    try {
                        var q = $(_this.s.formId).find(cusAttr(_this.s.searchInpKey, 'input')).val().trim();
                        _this.currentTab = $(this).val();

                        if (typeof q === 'undefined' || q === '') {// for empty search
                            return false;
                        }
                        else {
                            _this.changeHash(q, _this.currentTab, 1);
                        }

                    } finally {
                        e.preventDefault();
                    }
                });

                $('.autocomplete').css({// hide autocomplete on page load
                    'display': 'none'
                });

                /*
                 *  hash change event
                 *  This is only to handle empty search.
                 */

                if (typeof _this.isAjax !== 'undefined') {
                    $(window).on('hashchange', function() {
                        var h = $.hashParams();
                        if (typeof h.stq !== 'undefined' && h.stq === '') {// for empty searches
                            $(_this.s.noResultId).show();
                            $(_this.s.generalTopicsId).hide();
                        }
                        else if (typeof h.stq === 'undefined') {
                            $(_this.s.searchResultMsgId).hide();
                            $(_this.s.noResultId).hide();
                            $(_this.s.generalTopicsId).show();
                        }
                    });
                }
            },
            /*
             *  Attaching autocomplete to search box.
             *  Note : add autocmplete="false" to form to disable autocomplete
             */
            autoComplete: function() {
                var autoCompleteFlag = $(this.s.formId).attr('autocomplete');
                if (typeof autoCompleteFlag === 'undefined' || autoCompleteFlag !== 'false') {
                    $(this.s.formId).find(cusAttr(this.s.searchInpKey, 'input')).swiftype({
                        engineKey: this.s.engineKey,
                        resultLimit: 5
                    });
                }
            },
            /*
             * filter based on page type.
             */
            searchFilter: function() {
                if (this.s.tabs[this.currentTab].pageType === 'all') {
                    return {'page': {'type': this.s.categories}
                    };
                }
                else {
                    return  {'page': {'type': this.s.tabs[this.currentTab].pageType}
                    };
                }
            },
            /*
             * configure the category type for the swiftype crawler
             */
            configureCategoryType: function(options, currentTab) {
                var _this = this;
                if (typeof currentTab === 'undefined' || _this.s.tabs[currentTab].pageType === 'all')
                {
                    options.filters.page.type = _this.s.categories;
                }
                else {
                    options.filters.page.type = _this.s.tabs[currentTab].pageType;
                }
            },
            /*
             *
             * parse the url and return param value
             */
            urlParam: function(name) {
                var results = new RegExp('[\?&#]' + name + '=([^&#]*)', "i").exec(window.location.href);
                if (results === null) {
                    return null;
                }
                else {
                    return results[1] || '';
                }
            },
            /*
             * change hash on changing the tab
             */
            changeHash: function(searchQuery, currentTab, page) {
                var _queryString = 'tab=' + currentTab + '&stq=' + encodeURIComponent(searchQuery) + '&stp=' + page;
                location.hash = _queryString;

            },
            hashHandler: function() {
                var _this = this;
                return function(hashparams, options) {
                    var searchQuery = (typeof hashparams.stq !== 'undefined' ? hashparams.stq : '');
                    _this.currentTab = (typeof hashparams.tab !== 'undefined' ? hashparams.tab : 'all');
                    $(_this.s.resultTabId).find('option[value=' + _this.currentTab + ']').attr('selected', 'selected');
                    $(_this.s.formId).attr(_this.s.tabTypeKey, _this.currentTab);
                    //var selectedText = $(_this.s.resultTabId + ' option:selected').text();
                    var selectedText = $(_this.s.resultTabId).find('option[value=' + _this.currentTab + ']').text();
                    $(_this.s.formId + ' :submit').val(selectedText);
                    $('#select2-search-result-tab-container').text(selectedText).attr('title', selectedText);
                    $(_this.s.formId).find(cusAttr(_this.s.searchInpKey, 'input')).val(searchQuery);
                    _this.configureCategoryType(options, _this.currentTab);

                };
            },
            addExtraHash: function() {
                var _this = this;
                return function() {
                    return 'tab=' + _this.currentTab;
                };
            },
            /*
             * util method
             */
            qParam: function(name, value) {
                return name + "=" + encodeURIComponent(value);
            },
            /*
             * callback for result renderer
             */
            renderSearchResult: function() {
                var _this = this;
                return function(document_type, result) {
                    var info;
                    switch (result['type']) {
                        case 'docs':
                            info = 'Help documentation';
                            break;
                        case 'apidocs':
                            info = 'API reference';
                            break;
                        case 'tutorial':
                            info = 'API integration tutorials';
                            break;
                        case 'faq':
                            info = 'FAQ';
                            break;
                    }
                    var resultBody = (result.highlight['body'] || result['body']).substring(0, 250);
                    resultBody = resultBody.slice(0,resultBody.lastIndexOf(' '));
                    var data = {
                        title: result['title'],
                        url: result['url'],
                        body: resultBody,
                        info: info
                    };
                    return Mustache.render(_this.s.resultTemplate, data);
                };
            },
            /*
             * callback for loading renderer
             */
            renderLoadingSearch: function() {
                var _this = this;
                return function(query, $resultContainer) {
                    $(_this.s.searchResultLoading).show();
                };
            },
            /*
             * callback for Error renderer
             */
            renderSearchError: function() {
                var _this = this;
                return function(error, $resultContainer) {
                    $(_this.s.searchResultMsgId).hide();
                    $(_this.s.searchResultLoading).hide();
                    $(_this.s.noResultId).hide();
                    $resultContainer.html(_this.s.errorTemplate);
                    $(_this.s.generalTopicsId).hide();

                };

            },
            /*
             * callback which is called post rendering of result
             */
            postRender: function() {
                var _this = this;
                return function(data) {
                    try {
                        var totalResultCount = 0;
                        var $resultContainer = $(_this.s.resultContainerId);
                        var tabType = $(_this.s.formId).attr(_this.s.tabTypeKey);
                        //var tabValue = $(_this.s.resultTabId).val();
                        var resultText = 'All Sources';
                        switch (tabType) {
                            case 'docs':
                                resultText = 'Help documentation';
                                break;
                            case 'api':
                                resultText = 'API reference';
                                break;
                            case 'tutorial':
                                resultText = 'API integration tutorials';
                                break;
                            case 'faq':
                                resultText = 'FAQ';
                                break;
                        }
                        $(_this.s.searchResultLoading).hide();
                        if (data['info']) {
                            $.each(data['info'], function(index, value) {
                                totalResultCount += value['total_result_count'];
                            });
                        }
                        if (totalResultCount === 0) {// empty result
                            $(_this.s.searchResultMsgId).hide();
                            $(_this.s.noResultId).show();
                        }
                        else {
                            var resultData = {
                                searchCategory: resultText,
                                searchQuery: data.info.page.query
                            };
                            $(_this.s.searchResultMsgId).html(Mustache.render(_this.s.resultHeadingTemplate, resultData));
                            $(_this.s.searchResultMsgId).fadeIn(100);
                            $(_this.s.resultContainerId).find('.st-prev').text('').attr('title', 'previous').addClass('btn btn-default fa fa-long-arrow-left');
                            $(_this.s.resultContainerId).find('.st-next').text('').attr('title', 'next').addClass('btn btn-default fa fa-long-arrow-right');
                            $(_this.s.noResultId).hide();
                        }
                        $(_this.s.generalTopicsId).hide();
                        _this.logSearchEvent(data, 'Search', 'Search', _this.currentTab);
                    }
                    finally {
                        $(_this.s.searchResultLoading).hide();
                    }
                };
            },
            logSearchEvent: function(data, gaqEvent, eventName, tab) {
                var noresult = data.info.page.total_result_count === 0 ? true : false;
                $.ajax({url: "/licenses/cssheader.txt?event=" + encodeURIComponent(eventName)
                + "&search-content=" + encodeURIComponent(data.info.page.query)
                + "&search-tab=" + encodeURIComponent(tab)
                + "&no-result=" + encodeURIComponent(noresult)});

                ga('send', 'event', eventName, gaqEvent, data.info.page.query);
            }
        });
        return SwiftSearch;
    }();

    var cusAttr = function(attribute, value) {
        if (typeof value === 'undefined') {
            return '[' + attribute + ']';
        } else {
            return '[' + attribute + '="' + value + '"]';
        }
    };

    var defSetting = function() {
        return {
            target: 'https://www.uistacks.com/help/', //path for result page
            engineKey: '6MUYxPLDeSfPowA2zmwE', // swiftype Engine key
            tabs: {// tabs  ** pageType will be used to filter search
                'all': {id: '#all', pageType: 'all'},
                'docs': {id: '#docs', pageType: 'docs'},
                'forum': {id: '#forum', pageType: 'forum'},
                'api': {id: '#api', pageType: 'apidocs'},
                'tutorial': {id: '#tutorial', pageType: 'tutorial'},
                'faq': {id: '#faq', pageType: 'faq'},
            },
            categories: ['docs', 'apidocs', 'tutorial', 'faq'],
            formId: '#swift-search-form', // form id
            tabTypeKey: 'data-cb-type',
            ajax: 'data-cb-ajax',
            searchInpKey: 'data-cb-search',
            searchResultLoading: '.search-result-loading',
            noResultId: '#no-result',
            searchedForId: '#swift-searched-for',
            searchResultMsgId: '#search-result-heading',
            resultTabId: '#search-result-tab',
            resultContainerId: '#swift-result-container',
            generalTopicsId: '#general-topics',
            resultHeadingTemplate: 'Showing results from <span>{{searchCategory}}</span> for <strong>â€œ{{searchQuery}}â€</strong>.',
            resultTemplate: '<div class="search-result"><span class="tag">{{info}}</span><h6>{{title}}</h6><a target="_blank" href="{{url}}">{{url}}</a><p>{{{body}}}</p><hr></div>',
            loadingTemplate: '<div class="search-result-loading"><span>Loading search results...</span></div>',
            errorTemplate: '<div id="no-result" class="search-result-none block-space text-center"> <div class="h1 ProximaNova-Bold">Oops!</div> <p class="text-18">Your search failed due to a timeout.</p> <div class="text-18">Please try again after sometime or contact <a href="mailto:support@uistacks.com">support@uistacks.com</a> for any queries</div> <div class="block-top-space-sm">- Or -</div> <div class="block-space-sm"> <a href="/help/" class="btn btn-default"><span class="fa fa-long-arrow-left"></span> Go back to help and support</a> </div> </div>'
        };
    };

    $(document).ready(function() {
        new SwiftSearch();
    });
})(window.jQuery);



