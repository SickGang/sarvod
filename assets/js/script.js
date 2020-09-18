$(document).ready(function(){
  $('.posts_wrap').owlCarousel({
    items: 1,
    loop:true,
    margin:10,
    nav:true,
    dots: false,
    navText: ['<span class="prevArrow prevArrow_single"></span>','<span class="nextArrow nextArrow_single"></span>'],
  });

  $('.owl-carousel').owlCarousel({
    items: 1,
    loop:true,
    margin:10,
    nav:true,
    dots: false,
    navText: ['<span class="prevArrow"></span>','<span class="nextArrow"></span>'],
    URLhashListener:true,
    autoHeight:true,
    autoplayHoverPause:true,
    startPosition: 'URLHash'
  });
});

$('.datepicker-here').data('datepicker')

var app = new Vue({
  el: '#app',
  data() {
    return {
      showNav: false,
      data: '',
      // dataNews: '',
    }
  },
  methods: {
    hoverSvg(id) {
      axios.get('/wp-json/wp/v2/branches/'+id)
      .then(function (response) {
          this.data = response.data
          $('.map_descr-title').empty()
          $('.map_descr-title').append(data.title.rendered)
          $('.map_descr-adress').empty()
          $('.map_descr-adress').append(data.acf.adresses + ', ' + data.acf.directors + ', ' + data.acf.email + ', ' + data.acf.telephone)
          $('.map_descr-detail a').attr('href', data.link)
      })
      .catch(function (error) {
        console.log(error)
      })
    },
    filterCalendar() {
      let element = document.querySelector('.-selected-'),
          elementDay = element.dataset.date,
          elementMonth = ++element.dataset.month,
          elementYear = element.dataset.year

      let data = {
          'action': 'date-filter',
          'day': elementDay,
          'month': elementMonth,
          'year': elementYear
      }
      $.post('/wp-admin/admin-ajax.php', data, function(response) {
        $('.list-news').empty()
        if (response) {
          $('.list-news').append(response)
        } else {
          $('.wp-pagenavi').empty();
          $('.list-news').append('<div class="news-none col-12 text-center">Новостей в этот день не найдено!</div>'+
          '<div class="list-news col-12 text-center mt-5"><a class="list-news_a" href="/новости">Вернуться назад</a></div')
        }

        console.log(response)
      });

      // axios.get('/wp-json/wp/v2/news/?after=' + elementYear + '-0' + elementMonth + '-' + elementDay + 'T00:00:00&?before=' + elementYear + '-0' + elementMonth + '-' + elementDay + 'T23:59:59')
      // .then(function(response){
      //   this.dataNews = response.data
      //   $('.list-news').empty()
      // })
      // .catch(function (error) {
      //   console.log(error);
      // })
    }
  }
})
