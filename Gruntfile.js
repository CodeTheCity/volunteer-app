module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        shell: {
            gitRepoUpdate: {
                command: [
                    'git remote update --prune',
                    'git status'
                ].join('&&'),
                options: {
                    stdout: true
                }
            }
        },
        concat: {
            dist: {
                src: [
                    'public/assets/js/vendor/parsleyjs/parsley.js',
                    'public/assets/js/global.js',
                    'public/assets/js/vendor/restfulizer/restfulizer.js',
                    'public/assets/js/vendor/bootstrap/bootstrap.min.js'
                ],
                dest: 'public/assets/js/build/production.js',
            }
        },
        uglify: {
            build: {
                src: 'public/assets/js/build/production.js',
                dest: 'public/assets/js/build/production.min.js'
            }
        },

        jshint: {
            src: ['Gruntfile.js', 'public/assets/js/build/production.js', 'public/assets/js/build/production.min.js'],
            options: {
                curly: true,
                eqeqeq: true,
                immed: true,
                latedef: true,
                newcap: true,
                noarg: true,
                sub: true,
                undef: true,
                boss: true,
                eqnull: true,
                browser: true,
                globals: {
                    require: true,
                    define: true,
                    requirejs: true,
                    describe: true,
                    expect: true,
                    it: true
                }
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'public/assets/css/global.css': 'public/assets/css/global.scss'
                }
            }
        },
        watch: {
            scripts: {
                files: ['public/assets/js/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            },
            css: {
                files: ['public/assets/css/*/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                }
            },
        },
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-shell');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['shell', 'concat', 'uglify', 'sass', 'watch', 'jshint']);

};