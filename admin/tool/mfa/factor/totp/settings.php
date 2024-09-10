<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Settings
 *
 * @package     factor_totp
 * @subpackage  tool_mfa
 * @author      Mikhail Golenkov <golenkovm@gmail.com>
 * @copyright   Catalyst IT
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;

// IOMAD
require_once($CFG->dirroot . '/local/iomad/lib/company.php');
$companyid = iomad::get_my_companyid(context_system::instance(), false);
$postfix = "";
if (!empty($companyid)) {
    $postfix = "_$companyid";
}

$enabled = new admin_setting_configcheckbox('factor_totp/enabled' . $postfix,
    new lang_string('settings:enablefactor', 'tool_mfa'),
    new lang_string('settings:enablefactor_help', 'tool_mfa'), 0);
$enabled->set_updatedcallback(function () {
    global $postfix;
    \tool_mfa\manager::do_factor_action('totp', get_config('factor_totp', 'enabled' . $postfix) ? 'enable' : 'disable');
});
$settings->add($enabled);

$settings->add(new admin_setting_configtext('factor_totp/weight' . $postfix,
    new lang_string('settings:weight', 'tool_mfa'),
    new lang_string('settings:weight_help', 'tool_mfa'), 100, PARAM_INT));

$settings->add(new admin_setting_configduration('factor_totp/window' . $postfix,
    new lang_string('settings:window', 'factor_totp'),
    new lang_string('settings:window_help', 'factor_totp'), 30));

$settings->add(new admin_setting_configcheckbox('factor_totp/totplink' . $postfix,
    new lang_string('settings:totplink', 'factor_totp'),
    new lang_string('settings:totplink_help', 'factor_totp'), 1));
