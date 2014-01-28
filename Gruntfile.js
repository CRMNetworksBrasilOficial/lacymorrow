module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    clean: {
      dist: 'dist/*'
    },
    concat: {
      options: {
        separator: ';'
      },
      css: {
        src: ['src/css/**/*.css'],
        dest: 'dist/css/<%= pkg.name %>.css'
      },
      js: {
        src: ['src/js/**/*.js'],
        dest: 'dist/js/<%= pkg.name %>.js'
      }
    },
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
      },
      dist: {
        files: {
          'dist/js/<%= pkg.name %>.min.js': ['<%= concat.js.dest %>']
        }
      }
    },
    csslint: {
      src: [
        '<%= cssmin.dist.dest %>'
      ]
    },
    cssmin: {
      dist: {
        options: {
          noAdvanced: true, // turn advanced optimizations off until the issue is fixed in clean-css
          selectorsMergeMode: 'ie8',
          keepSpecialComments: 0
        },
        src: [
          'dist/css/*.css',
          '!*.min.css'
        ],
        dest: 'dist/css/<%= pkg.name %>.min.css'
      }
    },
    csscomb: {
      dist: {
        files: {
          'dist/css/<%= pkg.name %>.css': 'dist/css/<%= pkg.name %>.css',
          'dist/css/less.css': 'dist/css/less.css'
        }
      }
    },
    copy: {
      app: {
        expand: true,
        cwd: 'src/',
        src: ['app/**'],
        dest: 'dist/'
      },
      fonts: {
        expand: true,
        cwd: 'src/fonts/',
        src: ['**'],
        dest: 'dist/fonts/'
      },
      html: {
        expand: true,
        cwd: 'src/html/',
        src: ['**'],
        dest: 'dist/'
      },
      bootstrap: {
        expand: true,
        cwd: 'assets/bootstrap/dist/',
        src: ['**'],
        dest: 'dist/assets/bootstrap/'
      },
      ng: {
        expand: true,
        cwd: 'assets/angular.js/build/',
        src: ['**'],
        dest: 'dist/assets/ng/'
      }
    },
    htmlbuild: {
		dist: {
			src: 'index.html',
			dest: 'dist/',
			options: {
				beautify: true,
				relative: true,
				styles: {
                    bundle: [
                        '**/*.css'
                    ]
                },
				scripts: {
					app: '**/*.js'
				}
			}
		}
	},
	imagemin: {
		dist: {
			files: [{
				expand: true,
				cwd: 'src/', 
				src: ['img/**/*.{png,jpg,gif}'],
				dest: 'dist/'
			}]
		}
	},
	less: {
		dist: {
			options: {
				cleancss: true,
			},
			files: {
				"dist/css/less.css": "src/less/<%= pkg.name %>.less"
			}
		}
	},
    qunit: {
      files: ['test/**/*.html']
    },
    jshint: {
      dist: ['Gruntfile.js', 'src/js/**/*.js', 'test/**/*.js'],
      options: {
        // options here to override JSHint defaults
        globals: {
          jQuery: true,
          console: true,
          module: true,
          document: true
        }
      }
    },
    watch: {
      files: ['<%= jshint.dist %>','src/**/*'],
      tasks: ['jshint', 'qunit']
    }
  });
  require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

  //grunt.registerTask('test', ['jshint', 'qunit']);

  grunt.registerTask('default', ['clean', 'copy','imagemin', 'jshint', 'concat', 'less', 'csscomb', 'cssmin', 'uglify', 'htmlbuild']);

};