
(function() {


var navComponent = {
    navResize: true,
    animateIeFlag: true,
    animIESide: 'down',
    ellArrWidth: [],
    currentEll: 0,
    listWidth: 0,
    init: function () {
        this.navbar = document.getElementById('navbar');
        this.listShow = this.navbar.getElementsByClassName('list-show')[0];
        this.listHide = this.navbar.getElementsByClassName('list-hide')[0];
        this.workWrap = this.navbar;
        this.ellAnimateIE = {
            logo: this.navbar.getElementsByClassName('logo-anim-icon')[0],
            button: this.navbar.getElementsByClassName('nav-btn')[0]
        };


        for (var i = 0; i < this.listShow.children.length; i++) {
            this.ellArrWidth.push(this.listShow.children[i].offsetWidth);
            this.listWidth += this.listShow.children[i].offsetWidth;
        }
        this.listWidth += 20;

        (this.listHide.children.length === 0) ? this.listShow.lastElementChild.style.display = 'none' : this.listShow.lastElementChild.style.display = 'inline-block';


        window.addEventListener('resize', function () {
            navComponent.adaptNav();
        }, false);

        if (this.navbar.classList) {
            this.navbar.classList.add('loaded');
        } else {
            this.navbar.className = this.navbar.className + " loaded";
        }

        this.adaptNav();
    },
    checkNav: function () {
        var workWidth = this.workWrap.clientWidth,
            listShow = this.listShow.children,
            listHide = this.listHide.children;

        if (this.listWidth >= workWidth) {
            this.currentEll += 1;
            this.listWidth -= this.ellArrWidth[this.ellArrWidth.length - this.currentEll - 1];
            if (listHide.length === 0) listShow[listShow.length - 1].style.display = 'inline-block';
            this.ellReplaceToHide(listShow[listShow.length - 2]);
            this.checkNav();
        } else if (this.listWidth + this.ellArrWidth[this.ellArrWidth.length - this.currentEll - 1] < workWidth && listHide[0]) {
            this.listWidth += this.ellArrWidth[this.ellArrWidth.length - this.currentEll - 1];
            this.currentEll -= 1;
            this.ellReplaceToShow(listHide[0]);
            if (listHide.length === 0) listShow[listShow.length - 1].style.display = 'none';
            this.checkNav();
        }
    },
    ellReplaceToShow: function (ellement) {
        this.listShow.insertBefore(ellement, this.listShow.lastElementChild);
    },
    ellReplaceToHide: function (ellement) {
        (this.listHide.firstElementChild) ? this.listHide.insertBefore(ellement, this.listHide.firstElementChild) : this.listHide.appendChild(ellement);
    },
    adaptNav: function () {
        if (window.innerWidth <= 1366 && this.navbar.classList && !this.navbar.classList.contains('mobile-conf') || window.innerWidth <= 1366 && !/\bmobile-conf\b/g.test(this.navbar.className)) {
            if (this.navbar.classList) {
                this.navbar.classList.add('mobile-conf');
            } else {
                this.navbar.className = this.navbar.className + " mobile-conf";
                this.animIESide = 'down';
                this.animateScrollIe();
            }
            for (var i = this.listShow.children.length - 1; i > 0; i--) {
                this.currentEll += 1;
                this.listWidth -= this.ellArrWidth[this.ellArrWidth.length - this.currentEll - 1];
                if (this.listHide.children.length === 0) this.listShow.children[this.listShow.children.length - 1].style.display = 'inline-block';
                this.ellReplaceToHide(this.listShow.children[i - 1]);
                if (this.listWidth < this.ellArrWidth[this.ellArrWidth.length - 1]) this.listWidth = this.ellArrWidth[this.ellArrWidth.length - 1];
            }
        } else if (window.innerWidth > 1366) {
            if (this.navbar.classList && this.navbar.classList.contains('mobile-conf')) {
                this.navbar.classList.remove('mobile-conf');
            } else if (/\bmobile-conf\b/g.test(this.navbar.className)) {
                this.navbar.className = this.navbar.className.replace(/\b mobile-conf\b/g, "");
            }
            this.checkNav();
        }
    }
};

window.addEventListener('load', function (){
    if ($('#navbar').length > 0) navComponent.init();
}, false);

//nav grid
$('.masonry-grid').masonry({
    percentPosition: true,
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer'
});

$('.icon-drpdown').on('click', function(){
    $('.side-navbar').addClass('opened');
    if ($(window).width() < 1024) {
        $('body').css('overflow', 'hidden');
    }
});

$('.close-side').on('click', function(){
    $('.side-navbar').removeClass('opened');
    $('body').css('overflow', 'auto');
})


$('.about-modal').on('click', function(){
    $('.about-block').addClass('opened');
    $('body').css('overflow', 'hidden');
});

$('.close-about').on('click', function(){
    $('.about-block').removeClass('opened');
    $('body').css('overflow', 'auto');
})

$('.sheare-list-wrap .sheare-btn').on('click', function(){
  $(this).toggleClass('active');
  $(this).parent().find('.sheare-list').toggleClass('active');
})



// range-list
$('.rating-active').rating({
    fx: 'float',
    image: 'img/stars.png',
    loader: 'img/ajax-loader.gif',
    minimal: 0.6,
    // url: 'test.php',
    callback: function (responce) {
        this.vote_success.fadeOut(2000);
        if (responce.msg) console.log(responce.msg);
    }
});

$('.rating-static').rating({
    fx: 'float',
    image: 'img/stars.png',
    loader: 'img/ajax-loader.gif',
    minimal: 0.6,
    readOnly: true,
});

$('.rating-ell').on('click', function (e) {
    e.preventDefault();
 });



//selsect
$('.select-singl').select2({
    minimumResultsForSearch: Infinity,
    language: {
    noResults: function (params) {
      return "Результатов не найдено";
    }
  }
});




// datepicker
$('.date-start').datetimepicker({
  pickTime: false,
  language: 'ru'
});

$('.date-end').datetimepicker({
  pickTime: false,
  language: 'ru'
});

$('.date-start').on('dp.change', function (e) {
  $('.date-end').data('DateTimePicker').setMinDate(e.date);
});
$('.date-end').on('dp.change', function (e) {
  $('.date-start').data('DateTimePicker').setMaxDate(e.date);
});



/*
var moreBl = $('.read-more-block-sz .read-more-wrap');
for (var i = 0; i < moreBl.length; i++) {
    var height = $(moreBl[i]).data('height'),
        cont = $(moreBl[i]).children('.read-more-content').height();
    if (cont > height) {
        $(moreBl[i]).css('height', height + 'px');
    }
}

$('.read-more-block-sz .read-more-btn').on('click', function(){
    if ($(this).hasClass('open')) {
        var height = $(this).parent().find('.read-more-wrap').data('height');
        $(this).removeClass('open');
        $(this).find('.text').text('Читать далее');
        $(this).parent().find('.read-more-wrap').css('height', height + 'px');
    } else {
        var height = $(this).parent().find('.read-more-content').height();
        $(this).addClass('open');
        $(this).find('.text').text('Свернуть');
        $(this).parent().find('.read-more-wrap').css('height', height + 'px');
    }
});
*/


})();

