module.exports = function(grunt) {

	grunt.config('criticalcss', {
		home : {
			options: {
				url: 'http://local.altair',
				width: 1440,
				height: 900,
				outputfile: '<%= project.styles_critical %>/home.css',
				filename: '<%= project.styles_dev %>/main.dev.css',
			},
		},
		home_mobile : {
			options: {
				url: 'http://local.altair',
				width: 400,
				height: 960,
				outputfile: '<%= project.styles_critical %>/home.mobile.css',
				filename: '<%= project.styles_dev %>/main.dev.css',
			},
		},
		base : {
			options: {
				url: 'http://local.altair/base',
				width: 1440,
				height: 900,
				outputfile: '<%= project.styles_critical %>/base.css',
				filename: '<%= project.styles_dev %>/main.dev.css',
			},
		},
		base_mobile : {
			options: {
				url: 'http://local.altair/base',
				width: 400,
				height: 960,
				outputfile: '<%= project.styles_critical %>/base.mobile.css',
				filename:'<%= project.styles_dev %>/main.dev.css',
			},
		},
	});

};
