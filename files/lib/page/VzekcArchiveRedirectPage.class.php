<?php

namespace wcf\page;

use Laminas\Diactoros\Response\RedirectResponse;

/**
 * Redirects to the archive. The page exists so that a menu item can carry the
 * archive's access permission: the menu shows it only to users who have it.
 */
final class VzekcArchiveRedirectPage extends AbstractPage
{
    private const ARCHIVE_URL = 'https://archiv.classic-computing.de/';

    /**
     * @inheritDoc
     */
    public $loginRequired = true;

    /**
     * @inheritDoc
     */
    public $neededPermissions = ['user.archive.canAccess'];

    /**
     * @inheritDoc
     */
    public function readData()
    {
        parent::readData();

        return new RedirectResponse(self::ARCHIVE_URL);
    }
}
