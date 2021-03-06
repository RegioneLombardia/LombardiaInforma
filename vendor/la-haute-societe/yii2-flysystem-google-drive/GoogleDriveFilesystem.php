<?php
/**
 */

namespace lhs\Yii2FlysystemGoogleDrive;

use creocoder\flysystem\Filesystem;
use Google_Client;
use Google_Service_Drive;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use League\Flysystem\AdapterInterface;
use yii\base\InvalidConfigException;

/**
 * GoogleDriveFilesystem class
 *
 **/
class GoogleDriveFilesystem extends Filesystem
{

    public $clientId;
    public $clientSecret;
    public $refreshToken;
    public $rootFolderId;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->clientId === null) {
            throw new InvalidConfigException('The "clientId" property must be set.');
        }

        if ($this->clientSecret === null) {
            throw new InvalidConfigException('The "clientSecret" property must be set.');
        }

        if ($this->refreshToken === null) {
            throw new InvalidConfigException('The "refreshToken" property must be set.');
        }

        parent::init();
    }

    /**
     * @return AdapterInterface
     */
    protected function prepareAdapter()
    {
        $client = new Google_Client();
        $client->setClientId($this->clientId);
        $client->setClientSecret($this->clientSecret);
        $client->refreshToken($this->refreshToken);
        $service = new Google_Service_Drive($client);
        return new GoogleDriveAdapter($service, $this->rootFolderId); // Dossier chantier
    }
}
