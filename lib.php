<?php
defined('MOODLE_INTERNAL') || die();

function aeonquiz_add_instance($aeonquiz) {
    global $DB;
    $aeonquiz->timecreated = time();
    $aeonquiz->timemodified = time();
    return $DB->insert_record('aeonquiz', $aeonquiz);
}

function aeonquiz_update_instance($aeonquiz) {
    global $DB;
    $aeonquiz->timemodified = time();
    return $DB->update_record('aeonquiz', $aeonquiz);
}

function aeonquiz_delete_instance($id) {
    global $DB;
    return $DB->delete_records('aeonquiz', array('id' => $id));
}
