$(function () {

    /**
     * 初始化编辑器
     */
    var token = $("meta[name=x-csrf-token]").attr('content');

    var editor = new Simditor({
        toolbar: [
            'title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale',
            'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link',
            'image', 'hr', '|', 'alignment'
        ],
        textarea: '#editor',
        placeholder: '写点什么...',
        defaultImage: '/static/home/images/logo.png',
        imageButton: 'upload',
        upload: {
            url: '/article/upload',
            params: {_token: token},
            fileKey: 'img',
            leaveConfirm: '正在上传文件..',
            connectionCount: 3
        }
    });

    // 设置滚动条
    $("#article-collection").mCustomScrollbar({theme: "minimal", scrollInertia: 500});
    $("#article-list").mCustomScrollbar({theme: "dark", scrollInertia: 500});

    // 监听"创建文集"按钮点击事件
    $("#create").click(function () {
        $(this).next('.create-collection').slideDown(500);
    });

    // 创建文集点击事件
    $("form.create-collection>.buttons>button[type=reset]").click(function () {
        $(this).parents('form.create-collection').slideUp(500);
    });


    /**
     * 显示默认选中的文集和文集下的所有文章
     */
    var articleTitle = $("#content #article-title");
    // 如果用户有文集就发送ajax显示默认的文集中的文章, 否则不发送
    if ($(".collections").children().length){
        ajaxGetArticles(
            $('.collections>a.active').attr('data-href'),
            $('.collections a.active').attr('data-collection-id')
        );
    }

    /**s
     * Ajax获取文章
     */
    function ajaxGetArticles(requestUrl, collectionId) {

        $.ajax({
            type: "POST",
            dataType: "JSON",
            data: {'collectionId': collectionId},
            url: requestUrl,
            error: function () {
                failMsgForLayer();
            },
            success: function (response) {
                var articleList = '';
                if (response.length) {
                    for (var i in response) {
                        response[i].title.substr(0,16) + "..";
                        articleList += `
                            <li class="article"  data-href="/article/${response[i].id}" data-id="${response[i].id}">
                                <i class="fa fa-book"></i>
                                <span>${response[i].title}</span>
                                <button type="button" data-href="/trash/article/${response[i].id}"><i class="fa fa-trash"></i></button>
                            </li>`;
                    }
                } else {
                    // 没有文章显示空白
                    articleList = '';
                }
                // 设置文章列表中的内容
                $("#article-list ul.articles").html(articleList);
                // 设置创建文章按钮的collection-id属性
                $("#create-article").attr({"data-collection-id": collectionId});
                // 获取默认显示的文章
                setDefaultArticle();
            }
        });
    }


    function setDefaultArticle() {
        var defaultArticleId = $(".collections").attr("data-default");
        if (defaultArticleId) {
            var defaultArticle = $("li.article[data-id=" + defaultArticleId + "]");
            defaultArticle.addClass("active");
            setArticleContent(defaultArticle.attr('data-href'));
        }
    }


    /**
     * 创建文集
     */
    $(".buttons>.submit").click(function () {
        // 获取值,并且判断值是否为空
        var collectName = $("input[name='collection']").val();
        if (collectName === '') {
            failMsgForLayer('文集名称不能为空');
            return;
        }
        // 发送ajax创建
        sendAjaxRequest({
            url: "/collection",
            data: {name: collectName},
            success: function (response) {
                AjaxResponseForLayerMsg(response);
                var collection = $("<a data-href='/article/create/" + response.collectionId + "'>" + collectName + "</a>");
                $(".collections").append(collection);
            },
        });
    });


    // 监听文集链接点击事件, 获取指定文集的所有文章
    $("#sidebar").delegate(".collections>a", "click", function () {
        // 点击的加上active类, 其他移除active类
        $(this).addClass('active').siblings().removeClass('active');
        // ajax获取被点击的文集下的所有文章
        ajaxGetArticles($(this).attr('data-href'), $(this).attr('data-collection-id'));
    });


    function setArticleContent(url) {
        // 发送请求
        sendAjaxRequest({
            type: "GET",
            url: url,
            success: function (response) {
                $("#article-title").val(response.title);
                editor.setValue(response.content);
            }
        });
    }

    // 监听文章列表中的文章点击事件
    $("body").delegate("li.article", "click", function () {
        // 添加或移除一个类
        $(this).addClass("active").siblings().removeClass("active");
        setArticleContent($(this).attr('data-href'));
    });

    /**
     * 创建文章
     */
    $('#create-article').click(function () {
        var collectionId = $(this).attr('data-collection-id');
        sendAjaxRequest({
            url: $(this).attr('data-href'),
            data: {collectionId: collectionId},
            success: function (response) {
                AjaxResponseForLayerMsg(response);
                var article = $(`<li class="article" data-id="${response.articleId}" data-href="/article/${response.articleId}">
                            <i class="fa fa-book"></i>
                            <span>${response.title}</span>
                            <button type="button" data-href="/trash/article/${response.id}"><i class="fa fa-trash"></i></button>
                        </li>`);
                $('ul.articles #note').remove();
                $('ul.articles').append(article);
            }
        });
    });

    // 监听发布文章按钮的点击
    $('#create-article-btn').click(function () {
        var currentArticle = $('.articles>li.article.active');
        // 发送ajax请求
        sendAjaxRequest({
            url: currentArticle.attr('data-href'),
            type: "POST",
            data: {
                _method: 'PUT',
                id: currentArticle.attr('data-id'),
                title: articleTitle.val(),
                content: editor.getValue()
            },
            // ajax发送成功
            success: function (response) {
                AjaxResponseForLayerMsg(response);
            }
        });
    });


    /**
     * 监听标题文本框输入事件
     */
    articleTitle.keyup(function () {
        $('.articles>li.active>span').html($(this).val());
    });

    /**
     * 监听文章列表文章删除按钮的点击
     */
    $("#article-list").delegate("li.active>button", "click", function () {
        var article = $(this).parents('li.active');
        sendAjaxRequest({
            type: "get",
            url: "/trash/article",
            data: {articleId: article.attr('data-id')},
            success: function (response) {
                AjaxResponseForLayerMsg(response);
                article.stop().fadeOut(500);
            },
        });
    });

});