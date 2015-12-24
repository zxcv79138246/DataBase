var lastPage;
var windowSize = 5;
var startPage = 1;
var nameLength = 15;
var page = 1;
var keyword='';

$(function(){
	var $thisPage = $('.bookPage li');
		initialize();

	shortName();	//縮短書名加入...

	$thisPage.click(function(event) 	//點擊書頁目
	{
		if ($(this).data('type')=='+1')
		{
			if (page != lastPage)
				page ++;
		}else if ($(this).data('type')=='-1')
		{
			page --;
			if (page < 1)
				page = 1;
		}else
		{
			page = $(this).text();
		}
		moveWindow(page);
		movePage(page,keyword);
	});

	$('#search-form').submit(function(event) {		//點擊search
		$condition = $('.search').val();
		$.ajax({
			url: '/iLibrary/index.php/index/getPage/',
			dataType: 'JSON',
			data: {
				keyword: $('.search').val(),
				page: 1
			},
			success: function(response)
			{
				bookCount = response.count;
				keyword = $('.search').val();
				initialize();
				moveWindow(1);
				loadPage(response);
			}
		})
		return false;
	});
});

function initialize(){
	lastPage = Math.ceil(bookCount/6);
	windowSize = (lastPage < 5) ? lastPage : 5;
	$('.bookPage li.number').each(function(index, el) {
		if ($(this).text() > lastPage)
			$(this).hide();
		else
			$(this).show();
	});
	page=1;
	movePage(1,keyword);

}

function movePage
(page,keyword)		//移動書頁
{
	$list = $('.bookPage li.number');
	$list.removeClass('active');
	$list.each(function(index, el) {
		if ($(this).text() == page)
		{
			$(this).addClass('active');
		}
	});
	$.ajax({
		url: '/iLibrary/index.php/index/getPage/',
		dataType: 'JSON',
		data: {
			keyword: keyword,
			page: page
		},
		success: loadPage
	})
}

function loadPage(response)  //ajax 讀取頁面
{
	$bookImage = $('.book-image');
	$bookHref = $('.book-href');
	$bookName = $('.book-name');
	response = response.data;
	$bookImage.each(function(index, el) {
		if (response[index]==null)
		{
			$(this).hide();
		}else{
			$(this).show();
			this.src = response[index].cover;
			this.alt = response[index].name;
		}
	});
	$bookName.each(function(index, el) {
		if (response[index]==null)
		{
			$(this).hide();
		}else
		{
			$(this).show();
			$(this).text(response[index].name);
		}
	});
	shortName();
}

function moveWindow(page)	//移動 頁目表
{
	if (parseInt(page) + Math.ceil(windowSize/2) > lastPage)
	{
		startPage = lastPage-windowSize+1;
	}else if (page > Math.ceil(windowSize/2))
	{
		startPage = page - Math.floor(windowSize / 2);
	}else if (page == 1)
	{
		startPage = 1;
	}
	else if (page < Math.ceil(windowSize/2))
	{
		startPage = 1;
	}
	$('.bookPage li.number a').each(function(index, el) {
			$(this).text(startPage + index);
		});
}

function shortName()	//縮短書名加入...
{
	$('.book-name').each(function(index, el) {
		if ($(this).text().length > nameLength)
		{
			$(this).attr("title",$(this).text());
			var text = $(this).text().substring(0,nameLength-1)+"...";
            $(this).text(text);
		}		
	});
}
