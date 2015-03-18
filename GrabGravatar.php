<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\MyPlugin;

/**
 */
class GrabGravatar extends \Piwik\Plugin
{
    public function getListHooksRegistered()
    {
        return array(
            'Live.getExtraVisitorDetails' => array(
                'after' => true,
                'function' => 'linkBuilder'
            )
        );
    }

    public function linkBuilder(&$result)
    {
        $email = $result['userId'];
        $hash = md5( strtolower( $email ) );
        $base = 'http://www.gravatar.com/avatar/';
        $url = $base . $hash . '?s=120';
        $result['visitorAvatar'] = $url;
    }
}

?>
