(function($) {
	var calendar = {
		init: function(ajax) {
		if (ajax) {
	      // ajax call to print json
	      $.ajax({
	  				url: 'wp-content/themes/bakedwp/assets/data/events.json',
	  				type: 'GET',
	  			})
	  			.done(function(data) {
	          var events = data.events;
	          // loop json & append to dom
	          for (var i = 0; i < events.length; i++) {
	            $('.list').append('<div class="day-event" date-day="'+ events[i].day +'" date-month="' + events[i].month +'" date-year="'+ events[i].year +'" data-number="'+ i +'"><a href="#" class="close fontawesome-remove"></a><h2 class="title">'+ events[i].title +'</h2><p>'+ events[i].description +'</p><label class="check-btn"><input type="checkbox" class="save" id="save" name="" value=""/><span>Enresgistrer dans ma liste perso!</span></label></div>');
	          }
	          // start calendar
	          calendar.startCalendar();
	  			})
	  			.fail(function(data) {
	  				console.log(data);
	  			});
			} else {
	      // if not using ajax start calendar
	      calendar.startCalendar();
	    }
		},

	  startCalendar: function() {
	    var mon = 'Lundi';
			var tue = 'Mardi';
			var wed = 'Mercredi';
			var thur = 'Jeudi';
			var fri = 'Vendredi';
			var sat = 'Samedi';
			var sund = 'Dimanche';
			/**
			 * Get current date
			 */
			var d = new Date();
			var strDate = yearNumber + "/" + (d.getMonth() + 1) + "/" + d.getDate();
			var yearNumber = (new Date).getFullYear();
			/**
			 * Get current month and set as '.current-month' in title
			 */
			var monthNumber = d.getMonth() + 1;

			function GetMonthName(monthNumber) {
				var months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
				return months[monthNumber - 1];
			}

			setMonth(monthNumber, mon, tue, wed, thur, fri, sat, sund);

			function setMonth(monthNumber, mon, tue, wed, thur, fri, sat, sund) {
				$('.month').text(GetMonthName(monthNumber) + ' ' + yearNumber);
				$('.month').attr('data-month', monthNumber);
				printDateNumber(monthNumber, mon, tue, wed, thur, fri, sat, sund);
			}

			$('.btn-next').on('click', function(e) {
				var monthNumber = $('.month').attr('data-month');
				if (monthNumber > 11) {
					$('.month').attr('data-month', '0');
					yearNumber = yearNumber + 1;
					setMonth(parseInt(monthNumber) + 1, mon, tue, wed, thur, fri, sat, sund);
				} else {
					setMonth(parseInt(monthNumber) + 1, mon, tue, wed, thur, fri, sat, sund);
				}
			});

			$('.btn-prev').on('click', function(e) {
				var monthNumber = $('.month').attr('data-month');
				if (monthNumber < 2) {
					$('.month').attr('data-month', '13');
					yearNumber = yearNumber - 1;
					setMonth(parseInt(monthNumber) - 1, mon, tue, wed, thur, fri, sat, sund);
				} else {
					setMonth(parseInt(monthNumber) - 1, mon, tue, wed, thur, fri, sat, sund);
				}
			});

			/**
			 * Get all dates for current month
			 */

			function printDateNumber(monthNumber, mon, tue, wed, thur, fri, sat, sund) {

				$($('tbody.event-calendar tr')).each(function(index) {
					$(this).empty();
				});

				$($('thead.event-days tr')).each(function(index) {
					$(this).empty();
				});

				function getDaysInMonth(month, year) {
					// Since no month has fewer than 28 days
					var date = new Date(year, month, 1);
					var days = [];
					while (date.getMonth() === month) {
						days.push(new Date(date));
						date.setDate(date.getDate() + 1);
					}
					return days;
				}

				i = 0;

				setDaysInOrder(mon, tue, wed, thur, fri, sat, sund);

				function setDaysInOrder(mon, tue, wed, thur, fri, sat, sund) {
					var monthDay = getDaysInMonth(monthNumber - 1, yearNumber)[0].toString().substring(0, 3);
					$('thead.event-days tr').append('<td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td>');
				}

				$(getDaysInMonth(monthNumber - 1, yearNumber)).each(function(index) {
					var index = index + 1;
					if (index < 8) {
						$('tbody.event-calendar tr.1').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
					} else if (index < 15) {
						$('tbody.event-calendar tr.2').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
					} else if (index < 22) {
						$('tbody.event-calendar tr.3').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
					} else if (index < 29) {
						$('tbody.event-calendar tr.4').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
					} else if (index < 32) {
						$('tbody.event-calendar tr.5').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
					}
					i++;
				});
				var date = new Date();
				var month = date.getMonth() + 1;
				var thisyear = new Date().getFullYear();
				setCurrentDay(month, thisyear);
				setEvent();
				displayEvent();
			}

			/**
			 * Get current day and set as '.current-day'
			 */
			function setCurrentDay(month, year) {
				var viewMonth = $('.month').attr('data-month');
				var eventYear = $('.event-days').attr('date-year');
				if (parseInt(year) === yearNumber) {
					if (parseInt(month) === parseInt(viewMonth)) {
						$('tbody.event-calendar td[date-day="' + d.getDate() + '"]').addClass('current-day');
					}
				}
			}

			/**
			 * Add class '.active' on calendar date
			 */
			$('tbody td').on('click', function(e) {
				if ($(this).hasClass('event')) {
					$('tbody.event-calendar td').removeClass('active');
					$(this).addClass('active');
				} else {
					$('tbody.event-calendar td').removeClass('active');
				}
			});

			/**
			 * Add '.event' class to all days that has an event
			 */
			function setEvent() {
				$('.day-event').each(function(i) {
					var eventMonth = $(this).attr('date-month');
					var eventDay = $(this).attr('date-day');
					var eventYear = $(this).attr('date-year');
					var eventClass = $(this).attr('event-class');
					if (eventClass === undefined) eventClass = 'event';
					else eventClass = 'event ' + eventClass;

					if (parseInt(eventYear) === yearNumber) {
						$('tbody.event-calendar tr td[date-month="' + eventMonth + '"][date-day="' + eventDay + '"]').addClass(eventClass);
					}
				});
			}

			/**
			 * Get current day on click in calendar
			 * and find day-event to display
			 */
			function displayEvent() {
				$('tbody.event-calendar td').on('click', function(e) {
					$('.day-event').slideUp('fast');
					var monthEvent = $(this).attr('date-month');
					var dayEvent = $(this).text();
					$('.day-event[date-month="' + monthEvent + '"][date-day="' + dayEvent + '"]').slideDown('fast');
				});
			}

			/**
			 * Close day-event
			 */
			$('.close').on('click', function(e) {
				$(this).parent().slideUp('fast');
			});

			/**
			 * Save & Remove to/from personal list
			 */
			$('.save').click(function() {
				if (this.checked) {
					$(this).next().text('Effacer de la liste perso');
					var eventHtml = $(this).closest('.day-event').html();
					var eventMonth = $(this).closest('.day-event').attr('date-month');
					var eventDay = $(this).closest('.day-event').attr('date-day');
					var eventNumber = $(this).closest('.day-event').attr('data-number');
					$('.person-list').append('<div class="day" date-month="' + eventMonth + '" date-day="' + eventDay + '" data-number="' + eventNumber + '" style="display:none;">' + eventHtml + '</div>');
					$('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"]').slideDown('fast');
					$('.day').find('.close').remove();
					$('.day').find('.save').removeClass('save').addClass('remove');
					$('.day').find('.remove').next().addClass('hidden-print');
					remove();
					sortlist();
				} else {
					$(this).next().text('Enregistrer dans la liste perso');
					$('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').slideUp('slow');
					setTimeout(function() {
						$('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').remove();
					}, 1500);
				}
			});

			function remove() {
				$('.remove').click(function() {
					if (this.checked) {
						$(this).next().text('Effacer de la liste perso');
						var eventMonth = $(this).closest('.day').attr('date-month');
						var eventDay = $(this).closest('.day').attr('date-day');
						var eventNumber = $(this).closest('.day').attr('data-number');
						$('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').slideUp('slow');
						$('.day-event[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').find('.save').attr('checked', false);
						$('.day-event[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').find('span').text('Enregistrer dans la liste perso');
						setTimeout(function() {
							$('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').remove();
						}, 1500);
					}
				});
			}

			/**
			 * Sort personal list
			 */
			function sortlist() {
				var personList = $('.person-list');

				personList.find('.day').sort(function(a, b) {
					return +a.getAttribute('date-day') - +b.getAttribute('date-day');
				}).appendTo(personList);
			}

			/**
			 * Print button
			 */
			$('.print-btn').click(function() {
				window.print();
			});
	  },
	};
	jQuery(function($) {
		calendar.init('ajax');
	});
})(jQuery);



/*jQuery(document).ready(function(){
     jQuery('#json_click_handler').click(function(){
          doAjaxRequest();
     });
});
function doAjaxRequest(){

     jQuery.ajax({
          url: 'http://localhost/wordpress/wp-admin/admin-ajax.php',
          data:{
               'action':'do_ajax',
               'fn':'get_latest_posts',
               'count':10
               },
          dataType: 'JSON',
          success:function(data){
              jQuery("#json_response_box").html(data);
         },
          error: function(errorThrown){
               alert('error');
               console.log(errorThrown);
          }

     });

}
*/