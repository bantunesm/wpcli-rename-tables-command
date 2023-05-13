<?php
/**
 * Plugin Name: WP-CLI Rename Tables Command
 * Description: Command to rename tables in the database.
 * Author: Bruno ANTUNES
 * Version: 1.0
 */

if (defined('WP_CLI' ) && WP_CLI) {
  /**
   * Renames tables in the database.
   *
   * ## OPTIONS
   *
   * <old_prefix>
   * : The old prefix to replace.
   *
   * <new_prefix>
   * : The new prefix to use.
   *
   * ## USAGE
   *
   *     wp rename-tables wp_ new_prefix_
   *
   * @param array $args Command arguments.
   */
  function rename_tables_command($args) {

    list($old_prefix, $new_prefix) = $args;
  
    global $wpdb;
  
    $tables = $wpdb->get_results("SHOW TABLES LIKE '{$old_prefix}%'", ARRAY_N);
  
    if (!$tables) {
        WP_CLI::error('No tables found with the specified prefix.');
        return;
    }
  
    foreach ($tables as $table) {
        $old_table = $table[0];
        $new_table = str_replace($old_prefix, $new_prefix, $old_table);
  
        $result = $wpdb->query("RENAME TABLE `{$old_table}` TO `{$new_table}`");
  
        if (false === $result) {
            WP_CLI::warning("Failed to rename table: {$old_table}");
        } else {
            WP_CLI::success("Table renamed: {$old_table} to {$new_table}");
        }
    }
  
    WP_CLI::success('Tables renamed successfully.');
  }
 
  WP_CLI::add_command('rename-tables', 'rename_tables_command');
}
