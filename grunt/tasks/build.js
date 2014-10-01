module.exports = function(grunt) {

	grunt.registerTask('build', [], function () {
		grunt.loadNpmTasks('grunt-bump');
		grunt.loadNpmTasks('grunt-css-mqpacker');
		grunt.loadNpmTasks('grunt-hashify');
		grunt.loadNpmTasks('grunt-notify');
		grunt.task.run(
			'bump-only:patch', // Version bumped from 0.0.2 to 0.0.3
			'styles', // sass-concat',
			// 'oldie',
			'styles-minify',
			'criticalcss',
			'scripts-concat',
			'scripts-uglify',
			'hashify', // Generating an 'oldie' stylesheet? Make sure to enable the 'oldie' part in the hashify.js config!
			'notify:build'
		);
	});

};
