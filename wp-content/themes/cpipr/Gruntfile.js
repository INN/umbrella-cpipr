/*
 Setup Process:
 0.1. Install Node.js
 0.2. Install grunt
 0.3. Install dependencies: npm install
 1.1. Run 'grunt less' to compile less files
 1.2. Run 'grunt watch' to watch all less files for changes
*/
module.exports = function(grunt) {
    'use strict';

    // Force use of Unix newlines
    grunt.util.linefeed = '\n';

    var CSS_LESS_FILES = {
        'css/style.css': 'less/style.less',
        //'homepages/assets/css/cpipr.css': 'homepages/assets/less/cpipr.less',
    };
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        less: {
            development: {
                options: {
                    paths: ['less', '../largo-dev/less/inc'], // this includes all of largo's /less/inc.
                },
                files: CSS_LESS_FILES
            }
        },

        cssmin: {
            target: {
                options: {
                    report: 'gzip'
                },
                files: [{
                    expand: true,
                    cwd: 'css',
                    src: ['*.css', '!*.min.css'],
                    dest: 'css',
                    ext: '.min.css'
                },
                {
                    expand: true,
                    cwd: 'homepages/assets/css',
                    src: ['*.css', '!*.min.css'],
                    dest: 'homepages/assets/css',
                    ext: '.min.css'
                }]
            }
        },

        watch: {
            less: {
                files: [
                    'less/**/*.less',
                    'homepages/assets/less/**/*.less'
                ],
                tasks: [
                    'less:development',
                    'cssmin'
                ]
            }
        }
    });

    require('load-grunt-tasks')(grunt, { scope: 'devDependencies' });
};
