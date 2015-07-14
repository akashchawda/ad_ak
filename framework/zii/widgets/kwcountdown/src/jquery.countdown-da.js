﻿/* http://keith-wood.name/countdown.html
   Danish initialisation for the jQuery countdown extension
   Written by Buch (admin@buch90.dk). */
(function($) {
	$.countdown.regional['da'] = {
		labels: ['År', 'Måneder', 'Uger', 'Dage', 'Timer', 'Minutter', 'Sekunder'],
		labels1: ['År', 'Månad', 'Uge', 'Dag', 'Time', 'Minut', 'Sekund'],
		compactLabels: ['Å', 'M', 'U', 'D'],
		whichLabels: null,
		timeSeparator: ':', isRTL: false};
	$.countdown.setDefaults($.countdown.regional['da']);
})(jQuery);
