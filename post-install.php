<?php
if (!file_exists('.env')) {
  copy('.env.example', '.env');
}
