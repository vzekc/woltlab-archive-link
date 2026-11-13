# Archiv im Menü

A WoltLab Suite 6.2 package: the page "Archiv" redirects to archiv.classic-computing.de, and
a menu item linking to it shows only for users with the group permission
`user.archive.canAccess` (from `de.vzekc.archiv.einreichen`, the permission the archive
itself checks). The menu item opens the archive in a new tab.

## Setup in the ACP

Under Darstellung → Menüs → Hauptmenü, the menu item "Archiv" below "Mitglieder" links to
the internal page "Archiv" (de.classic-computing.archive-link.Archive).

## Implementation

- `page.xml` gives the page the permission `user.archive.canAccess`; `MenuItem::isVisible`
  hides menu items whose page the user cannot see.
- `VzekcArchiveRedirectPage` checks the same permission and answers with a redirect.
- A template listener on `footer` opens links to the page in a new tab.

## Build

```sh
./build.sh
```

writes `build/de.classic-computing.archive-link_<version>.tar`. To install it in the
`woltlab-dev` forum, copy the archive to `site/devpkg/` and run, in `woltlab-dev`:

```sh
docker compose exec -T -u www-data -w /var/www/html web php devpkg/install-package.php devpkg/<archive> 1
```
