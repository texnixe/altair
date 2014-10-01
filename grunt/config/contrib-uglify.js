module.exports = function(grunt) {

	grunt.config('uglify', {
		options: {
			mangle: false, // Set to false to prevent changes to your variable and function names
		},
		head: {
			files: {
				'<%= project.scripts_min %>/head.scripts.min.js': '<%= project.scripts_dev %>/head.scripts.dev.js', // destination: source
			},
		},
		main: {
			options: {
				banner: '<%= tag.banner %>',
			},
			files: {
				'<%= project.scripts_min %>/main.scripts.min.js': '<%= project.scripts_dev %>/main.scripts.dev.js', // destination: source
				'<%= project.scripts_min %>/mobile.scripts.min.js': '<%= project.scripts_dev %>/mobile.scripts.dev.js',
			},
		},
	});

};
