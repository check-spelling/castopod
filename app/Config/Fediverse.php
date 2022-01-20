<?php

declare(strict_types=1);

/**
 * @copyright  2022 Podlibre
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html AGPL3
 * @link       https://castopod.org/
 */

namespace Config;

use Modules\Fediverse\Config\Fediverse as FediverseBaseConfig;

class Fediverse extends FediverseBaseConfig
{
    public function __construct()
    {
        parent::__construct();

        $defaultBanner = config('Images')
            ->podcastBannerDefaultPaths[service('settings')->get('App.theme')] ?? config(
                'Images'
            )->podcastBannerDefaultPaths['default'];

        ['dirname' => $dirname, 'extension' => $extension, 'filename' => $filename] = pathinfo(
            $defaultBanner['path']
        );
        $defaultBannerPath = $filename;
        if ($dirname !== '.') {
            $defaultBannerPathList = [$dirname, $filename];
            $defaultBannerPath = implode('/', $defaultBannerPathList);
        }

        helper('media');

        $this->defaultCoverImagePath = media_path($defaultBannerPath . '_federation.' . $extension);
        $this->defaultCoverImageMimetype = $defaultBanner['mimetype'];
    }
}
