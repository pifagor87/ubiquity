<?php

/**
 * Ubiquity\core
 * This class is part of Ubiquity
 * @author jc
 * @version 1.0.3
 *
 */
namespace Ubiquity\core;

use Ubiquity\assets\AssetsManager;
use Ubiquity\contents\normalizers\NormalizersManager;
use Ubiquity\controllers\Router;
use Ubiquity\controllers\Startup;
use Ubiquity\orm\OrmUtils;
use Ubiquity\translation\TranslatorManager;
use Ubiquity\utils\http\UCookie;
use Ubiquity\utils\http\URequest;
use Ubiquity\utils\http\USession;
use Ubiquity\cache\CacheManager;

class Framework {
	public const version = '2.4.12';

	public static function getVersion(): string {
		return self::version;
	}

	public static function getController(): ?string {
		return Startup::getController ();
	}

	public static function getAction(): ?string {
		return Startup::getAction ();
	}

	public static function getUrl(): string {
		return \implode ( '/', Startup::$urlParts );
	}

	public static function getRouter(): Router {
		return new Router ();
	}

	public static function getORM(): OrmUtils {
		return new OrmUtils ();
	}

	public static function getRequest(): URequest {
		return new URequest ();
	}

	public static function getSession(): USession {
		return new USession ();
	}

	public static function getCookies(): UCookie {
		return new UCookie ();
	}

	public static function getTranslator(): TranslatorManager {
		return new TranslatorManager ();
	}

	public static function getNormalizer(): NormalizersManager {
		return new NormalizersManager ();
	}

	public static function hasAdmin(): bool {
		return \class_exists ( "controllers\Admin" );
	}

	public static function getAssets(): AssetsManager {
		return new AssetsManager ();
	}

	public static function getCacheSystem():string {
		return \get_class ( CacheManager::$cache );
	}

	public static function getAnnotationsEngine():string {
		return \get_class ( CacheManager::getAnnotationsEngineInstance () );
	}
}

