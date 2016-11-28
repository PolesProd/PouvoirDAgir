(function($) {
	var urlArticle = [];
	var calendar = {
		init: function(ajax) {
		if (ajax) {
	      // Appel ajax pour imprimer le JSON
	      $.ajax({
	  				// url: 'wp-content/uploads/events.json',
	  				url: 'http://localhost/wordpress/?json=get_posts&post_type=events',
	  				type: 'GET',
	  			})
	  			.done(function(data) {
	          var events = data.posts;
	          // Boucles dans le tableau events et ajoute le contenu dans le DOM

	          for (var i = 0; i < events.length; i++) {
	          	var date = events[i].custom_fields['wpsc_start_date'][0];
	          	var format = date.split("/");

	          	var day = format[1];
	          	var month = format[0];
	          	var year = format[2];

							var dateFormat = day + '/' + month + '/' + year;

	          	var title = events[i].title;
	          	var description = events[i].excerpt;

	          	var url = events[i].url;
							var urlOrg = events[i].custom_fields['wpsc_url'];
							var urlLieu = events[i].taxonomy_wpsclocation[0].slug;

	          	var categorie = events[i].taxonomy_wpsccategory[0].title;
	          	var tags = events[i].tags[0];

	          	var lieu = events[i].taxonomy_wpsclocation[0].title;
	          	var org = events[i].custom_fields['wpsc_reg_text'][0];

	          	urlArticle.push(url);

	            $('.list').append('<div class="day-event" date-day="'+ day +'" date-month="' + month +'" date-year="'+ year +'" data-number="'+ i +'"><a href="#" class="close"></a><div class="date"><p class="eventDate">&#128197;'+ dateFormat +'</p><p class="eventLieu"><a href="http://localhost/wordpress/?wpsclocation='+ urlLieu +'">'+ lieu + '</a></p><p class="eventOrg"><a href="'+ urlOrg +'">&#x260e;' + org + '</a></p></div><h2 class="title">'+ events[i].title +'</h2><p>'+ description +'</p><p>'+ tags +'</p><label class="check-btn"><input type="checkbox" class="save" id="save" name="" value=""/><span><a href="'+ url +'">Voir l\'événement</a></span></label></div>');
						}
	          // Démarre le calendrier
	          calendar.startCalendar();
	  			})
	  			.fail(function(data) {
	  				console.log(data);
	  			});
			} else {
	      // Si on n'utilise pas ajax: début du calendrier calendrier
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
			 * Obtenir la date actuelle
			 */
			var d = new Date();
			var strDate = yearNumber + "/" + (d.getMonth() + 1) + "/" + d.getDate();
			var yearNumber = (new Date()).getFullYear();

			/**
			 * Obtenir le mois courant et définir comme '.current-month' dans le titre
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
			 * Obtenir toutes les dates pour le mois en cours
			 */

			function printDateNumber(monthNumber, mon, tue, wed, thur, fri, sat, sund) {

				$($('tbody.event-calendar tr')).each(function(index) {
					$(this).empty();
				});

				$($('thead.event-days tr')).each(function(index) {
					$(this).empty();
				});

				function getDaysInMonth(month, year) {
					// Aucun mois n'a moins de 28 jours
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
			 * Obtenir le jour actuel et définir comme '.current-day'
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
			 * Ajoute la classe '.active' à la date du calendrier
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
			 * Ajoute la classe '.event' à tous les jours qui ont un événement
			 */
			function setEvent() {
				$('.day-event').each(function(i) {
					var eventMonth = $(this).attr('date-month');
					var eventDay = $(this).attr('date-day');
					var eventYear = $(this).attr('date-year');
					var eventClass = $(this).attr('event-class');
					var eventUrl = $(this).attr('event-url');
					if (eventClass === undefined) eventClass = 'event';
					else eventClass = 'event ' + eventClass;

					if (parseInt(eventYear) === yearNumber) {
						$('tbody.event-calendar tr td[date-month="' + eventMonth + '"][date-day="' + eventDay + '"]').addClass(eventClass);
					}
				});
			}

			/**
			 * Obtenir le jour en cliquant sur le calendrier
			 * Et trouver l'événement du jour à afficher
			 */
			function displayEvent() {
				$('tbody.event-calendar td').on('click', function(e) {
					$('.day-event').slideUp('fast');
					var monthEvent = $(this).attr('date-month');
					var dayEvent = $(this).text();
					var searchUrl = $('.day-event[date-month="' + monthEvent + '"][date-day="' + dayEvent + '"]');
					searchUrl = searchUrl[0].attributes[4].value;
					var url = urlArticle[searchUrl];
					console.log("trucmuche");

					if ($('.home').length == 0) {
						$('.day-event[date-month="' + monthEvent + '"][date-day="' + dayEvent + '"]').slideDown('fast');
						console.log("tregknnsqc*ù");
					}else {
						window.location.href = url;
					}
				});
			}

			/**
			 * Ferme l'événement du jour
			 */
			$('.close').on('click', function(e) {
				$(this).parent().slideUp('fast');
			});
	  },
	};
	jQuery(function($) {
		calendar.init('ajax');
	});
})(jQuery);
