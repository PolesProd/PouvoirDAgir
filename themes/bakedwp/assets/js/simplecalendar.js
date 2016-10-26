(function($) {
	var calendar = {
		init: function(ajax) {
			if (ajax) {
				// Appeler ajax pour imprimer du json.
				$.ajax({
					url: 'wp-content/themes/bakedwp/assets/data/events.json',
					type: 'GET',
				})
				.done(function(data) {
					var events = data.events;
					// Créé la boucle json et l'ajouter au DOM.
					for (var i = 0; i < events.length; i++) {
						$('.list').append('<div class="day-event" date-day="'+ events[i].day +'" date-month="' + events[i].month +'" date-year="'+ events[i].year +'" data-number="'+ i +'"><a href="#" class="close fontawesome-remove"></a><h2 class="title">'+ events[i].title +'</h2><p>'+ events[i].description +'</p><label class="check-btn"><input type="checkbox" class="save" id="save" name="" value=""/><span>Enresgistrer dans ma liste perso!</span></label></div>');
					}
					// Commencer le calendrier.
					calendar.startCalendar();
				})
				.fail(function(data) {
					console.log(data);
				});
			} else {
				// Sinon en utilisant le calendrier de démarrage ajax.
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
			* Obtenir le mois en cours et définir comme «.current month» dans le titre.
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
			* Obtenir toutes les dates pour le mois en cours.
			*/
			function printDateNumber(monthNumber, mon, tue, wed, thur, fri, sat, sund) {

				$($('tbody.event-calendar tr')).each(function(index) {
					$(this).empty();
				});

				$($('thead.event-days tr')).each(function(index) {
					$(this).empty();
				});

				function getDaysInMonth(month, year) {
					// Défini qu'il y a aucun mois à moins de 28 jours.
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
					/*var index = index + 1;*/
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
			* Obtenir la journée en cours et définir comme '.current-day'
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
			* Ajoute la classe '.event' à tous les jours qui ont un événement.
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
			* Obtenir le jour en cours lors d'un clic dans le calendrier
			* Et trouver l'événement de ce jour pour l'afficher.
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
			* Fermer l'événement du jour
			*/
			$('.close').on('click', function(e) {
				$(this).parent().slideUp('fast');
			});

			/**
			* Enregistrer & Supprimer la liste personnelle.
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
					$('.day[date-month="' + date-month + '"][date-day="' + date-day + '"][data-number="' + date-number + '"]').slideUp('slow');
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
			* Trier liste personnelle.
			*/
			function sortlist() {
				var personList = $('.person-list');

				personList.find('.day').sort(function(a, b) {
					return +a.getAttribute('date-day') - +b.getAttribute('date-day');
				}).appendTo(personList);
			}

			/**
			* Bouton Imprimer
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
