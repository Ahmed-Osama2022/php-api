<?php
if (!file_exists('.env')) {
  copy('.env.example', '.env');
}

if (is_dir('screenshots')) {
  array_map('unlink', array_filter((array)glob('screenshots/*')));
  rmdir('screenshots');
}
