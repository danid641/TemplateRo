<?php
include 'autoload.php';

session_start();


class UploaderController extends users
{
    public $UploadToTemplatePlusError;

    public function __construct()
    {

        global $username;
        global $category;
        global $next_to_addProduct;
        global $AllowedThemeArchitectureVersion;
        global $AllowedTempoBPM;
        global $AllowedVocals;
        global $AllowedAfterEffectsVersion;
        global $AllowedMagentoEngine;
        global $AllowedMagentoCompatibility;
        global $AllowedMagentoExtensions;
        global $AllowedPrestashopEngine;
        global $AllowedPrestaShopCompatibility;
        global $AllowedMagentoCompatibility;
        global $AllowedElementorVersion;
        global $AllowedOpencartEngine;
        global $AllowedOpencartCompatibility;
        global $AllowedOpenCartModules;
        global $AllowedMotoCMSVersion;
        global $AllowedMotoCMSWidgets;
        global $AllowedMotoTrialType;
        global $AllowedZenCartCompatibility;
        global $AllowedJoomlaCompatibility;
        global $AllowedJoomlaBuilder;
        global $AllowedVirtuemartCompatibility;
        global $AllowedDrupalEngine;
        global $AllowedDrupalCompatibility;
        global $AllowedWordpressEngine;
        global $AllowedWordPressCompatibility;
        global $AllowedWooCommerceCompatibility;
        global $AllowedWordPressBuilder;
        global $AllowedCompatibleWith;
        global $AllowedProductFeatures;
        global $AllowedStyles;
        global $AllowedToolsNeededtoUsetheProduct;
        global $AllowedColor;
        global $AllowedImagesIncluded;
        global $AllowedGraphicsType;
        global $AllowedIconStyles;
        global $AllowedCompatibility;
        global $AllowedFilesIncluded;
        global $AllowedLength;
        global $AllowedResolution;
        global $AllowedSoftwareVersion;
        global $AllowedFeatures;
        global $AllowedPolygonCount;
        global $AllowedBootstrapVersion;
        global $AllowedEmailSystemsCompatibility;
        global $AllowedCurrencies;
        global $AllowedLanguageSupport;
        global $AllowedWebForms;
        global $ProductSellAsFree;

        $this->db();
        $this->GetName();
        $this->checkLogged();

        $conn = $this->conn;
        $username = $this->username;
        $next_to_addProduct = false;


        function array_check_multiple_values($search, $source)
        {
            return (count(array_intersect($search, $source)) == count($search));
        }


        // Bootstrap Version
        $BootstrapVersionCheckValue = [
            '2.1.0',
            '2.1.1',
            '2.2.0',
            '2.2.2',
            '2.3.0',
            '2.3.1',
            '3.0',
            '3.0.1',
            '3.0.2',
            '3.0.3',
            '3.1.0',
            '3.2.0',
            '3.3.x',
            '4.0.x',
            '4.1.x',
            '4.2.x',
            '4.3.x',
            '4.4.x',
            '4.5.x',
            '5.alphaX',
            '5.x'
        ];

        // Graphics Type
        $GraphicsTypeCheckValue = [
            'Raster',
            'Vector'
        ];

        // Icon Styles
        $IconStylesCheckValue = [
            '3D',
            'Android',
            'Badge',
            'Circle',
            'Clipart',
            'Colored',
            'Doodle',
            'Dotted',
            'Emoji',
            'Flat',
            'Glyph',
            'Gradient',
            'Hand-drawn',
            'Material',
            'Office',
            'Outline',
            'Pastel',
            'Photorealistic',
            'Windows',
            'iOS'
        ];

        // Compatibility
        $CompatibilityCheckValue = [
            'iWork Pages',
            'Sketch',
            'Microsoft Word',
            'Figma',
            'Corel Draw',
            'Code Editor',
            'Adobe XD',
            'Adobe Photoshop',
            'Adobe InDesign',
            'Adobe Illustrator'
        ];

        // Software Version
        $SoftwareVersionCheckValue = [
            'After Effects CC',
            'Premiere Pro CC'
        ];

        $NotDefined = [
            'AI',
            'BMP',
            'CDR',
            'CSS',
            'DOC',
            'DOCX',
            'EPS',
            'FIG',
            'GIF',
            'HTML',
            'ICO',
            'INDD',
            'JPG',
            'OTF',
            'PAGES',
            'PDF',
            'PNG',
            'PSD',
            'RAW',
            'SVG',
            'TIFF',
            'TTF',
            'TXT',
            'XD'
        ];

        // Tempo (BPM)
        $TempoBPMCheckValue = [
            'Fast (140 - 160 BPM)',
            'Medium (90 - 110 BPM',
            'Slow (60 - 90 BPM)',
            'Upbeat (110 - 140 BPM)',
            'Very fast (160+ BPM)',
            'Very slow (0 - 60 BPM)'
        ];

        //After Effects Version
        $AfterEffectsVersion = [
            'After Effects CC',
            'After Effects CS3',
            'After Effects CS4',
            'After Effects CS5',
            'After Effects CS5.5',
            'After Effects CS6'
        ];

        // Files Included
        $FilesIncludedCheckValue = [
            'After Effects Files',
            'Disign Files',
            'Motion Graphics Template Files',
            'Music Files',
            'Premiere Pro Project Files',
            'Script Files',
            'Sound Effect Files',
            'Video Files'
        ];

        // Vocals
        $VocalsCheckValue = [
            'Background Vocals',
            'Instrumental Included',
            'Lead vocals',
            'Vocal samples'
        ];

        // Email Systems Compatibility
        $EmailSystemsCompatibilityCheckValue = [
            'Yandex Mail',
            'Yahoo Mail',
            'Outlook 2007',
            'Mozilla Thunderbird',
            'Mail.ru',
            'Hotmail',
            'Gmail Apple',
            'Gmail App for Android (partly supported)',
            'Apple Mail',
            'AOL Mail'
        ];

        // Features
        $FeaturesCheckValue = [
            '3D Print',
            '3D Scan',
            'Animated',
            'High poly',
            'Low poly',
            'PBR',
            'Rigged'
        ];

        // Resolution
        $ResolutionCheckValue = [
            '4K',
            '5K+',
            'HD (1080)',
            'HD (720)',
            'SD'
        ];

        // Elementor Version
        $ElementorVersionCheckValue = [
            'Free',
            'Pro'
        ];

        // WordPress Engine
        $WordPressEngineCheckValue = [
            '5.9.x',
            '5.6.x',
            '5.5.x',
            '5.4.x',
            '5.3.x',
            '5.2.x',
            '5.1.x',
            '5.0',
            '4.9.x',
            '4.8.x',
            '4.7.x',
            '4.6.x',
            '4.5.x',
            '4.4.x',
            '4.3.x',
            '4.2.x',
            '4.1.x',
            '4.0.x',
            '3.9.x',
            '3.8.x',
            '3.7.x',
            '3.6.x',
            '3.5.x',
            '3.4.x',
            '3.3.2',
            '3.3.1',
            '3.3',
            '3.2.1',
            '3.1.3',
            '3.1',
            '3.0.x',
            '3.0',
            '2.9',
            '2.8',
            '2.7',
            '2.6',
            '2.3.x',
            '2.1.x'
        ];

        // WordPress Compatibility
        $WordPressCompatibilityCheckValue = [
            '6.0.x',
            '5.9.x',
            '5.8.x',
            '5.7.x',
            '5.6.x',
            '5.5.x',
            '5.4.x',
            '5.3.x',
            '5.2.x',
            '5.1.x',
            '5.0.x',
            '5.0-5.6.x',
            '5.4.x',
            '4.9.x',
            '4.8.x',
            '4.7.x',
            '4.6.x',
            '4.5.x',
            '4.4.x',
            '4.3.x',
            '4.2.x-4.9.x',
            '4.2.x',
            '4.1.x',
            '4.0.x',
            '3.9.x',
            '3.8.x',
            '3.7.x',
            '3.6.x-4.2.x',
            '3.6.x',
            '3.5.x',
            '3.4.x',
            '3.2.x - 3.4.x',
            '3.0.x - 3.4.x',
            '3.0.x',
            '2.1.x - 2.9.x',
            '2.0.x'
        ];

        // WordPress Builder
        $WordPressBuilderCheckValue = [
            'Beaver Builder',
            'Breeze Page Builder',
            'Cherry Framework 3',
            'Cherry Framework 4',
            'Cherry Framework 5',
            'Divi Builder',
            'Elementor Website Builder',
            'Gutenberg Editor',
            'KingComposer',
            'MotoPress Editor',
            'Visual Composer',
            'WPBakery Page Builder',
            'WordPress Customizer API'
        ];

        // WooCommerce Compatibility
        $WooCommerceCompatibilityCheckValue = [
            '6.5.x',
            '6.4.x',
            '6.3.x',
            '6.2.x',
            '6.1.x',
            '6.0.x',
            '5.9.x',
            '5.8.x',
            '5.7.x',
            '5.6.x',
            '5.5.x',
            '5.4.x',
            '5.3.x',
            '5.2.x',
            '5.1.x',
            '5.0.x',
            '4.9.x',
            '4.8.x',
            '4.7.x',
            '4.6.x',
            '4.5.x',
            '4.4.x',
            '4.3.x',
            '4.2.x',
            '4.1.x',
            '4.0.x',
            '3.9.x',
            '3.8.x',
            '3.7.x',
            '3.6.x-4.2.x',
            '3.6.x',
            '3.5.x',
            '3.4.x',
            '3.3.x',
            '3.2.x',
            '3.1.x',
            '3.0.x',
            '2.6.x',
            '2.5.x',
            '2.4.x',
            '2.3.x',
            '2.2.x',
            '2.1.x-2.4.x',
            '2.0.x',
            '2.0.19',
            '2.0.18',
            '2.0.14'
        ];

        // Compatible with
        $CompatibleWithCheckValue = [
            'Booked',
            'Ecwid',
            'LearnPress',
            'MailChimp',
            'Polylang',
            'Revolution Slider',
            'WPML',
            'WooCommerce'
        ];

        // Styles
        $StylesCheckValue = [
            '3D effect',
            'Artworks',
            'Cartoon',
            'Clean',
            'Collage',
            'Corporate',
            'Dark',
            'Flat',
            'Futurist',
            'Geometric',
            'Grunge',
            'Material Design',
            'Minimalist',
            'Mobile',
            'Neutral',
            'Retro',
            'Urban/Street',
            'Vector',
            'web2.0'
        ];

        // Moto CMS Version
        $MotoCMSVersionCheckValue = [
            '3.1.1',
            '3.1.2',
            '3.1.3',
            '3.2.5',
            '3.3.18'
        ];

        // Moto CMS Widgets
        $MotoCMSWidgetsCheckValue = [
            'Google Maps',
            'Media library',
            'Menu',
            'Presets Builder'
        ];

        // Moto Trial Type
        $MotoTrialTypeCheckValue = [
            'Trial-Moto3',
            'Trial-MotoFlash',
            'Trial-MotoHTML'
        ];

        // Theme Architecture Version
        $ThemeArchitectureVersionCheckValue = [
            'Online Store 2.0',
            'Vintage'
        ];

        // Magento Engine
        $MagentoEngineCheckValue = [
            '2.4.4',
            '2.4.3',
            '2.4.2',
            '2.4.1',
            '2.4.0',
            '2.3.5',
            '2.3.4',
            '2.3.3',
            '2.3.2',
            '2.3.1',
            '2.3.0',
            '2.2.6',
            '2.2.5',
            '2.2.4',
            '2.2.3',
            '2.2.2',
            '2.2.1',
            '2.2.0',
            '2.1.8',
            '2.1.7',
            '2.1.6',
            '2.1.5',
            '2.1.4',
            '2.1.3',
            '2.1.2',
            '2.1.1',
            '2.1.0',
            '2.0.7',
            '2.0.6',
            '2.0.5',
            '2.0.4',
            '2.0.2',
            '2.0.0',
            '1.9.x',
            '1.9.2.4',
            '1.9.2.3',
            '1.9.2.2',
            '1.8.1.x',
            '1.8.0.x',
            '1.7.0.x',
            '1.6.2.x',
            '1.6.1.x',
            '1.6.0.x',
            '1.5.1.x',
            '1.5.0.x',
            '1.4.2.x',
            '1.4.1.x',
            '1.4.0.1',
            '1.4.0',
            '1.3.x',
            '1.3.2.x',
            '1.3.0',
            '1.2.x',
            '1.1.8',
            '1.1.7',
            '1.1.6'
        ];

        // Magento Compatibility
        $MagentoCompatibilityCheckValue = [
            '2.4.4',
            '2.4.3',
            '2.4.2',
            '2.4.',
            '2.4.0',
            '2.3.5',
            '2.3.4',
            '2.3.3',
            '2.3.2',
            '2.3.1',
            '2.3.0',
            '2.2.7',
            '2.2.6',
            '2.2.5',
            '2.2.4',
            '2.2.3',
            '2.2.2',
            '2.2.1',
            '2.2.0',
            '2.1.x',
            '2.1.8',
            '2.1.7',
            '2.1.6',
            '2.1.5',
            '2.1.4',
            '2.1.3',
            '2.1.2',
            '2.1.0',
            '2.0.x',
            '2.0.7',
            '2.0.6',
            '2.0.5',
            '1.9.x',
            '1.9.2.x',
            '1.8.x-1.9.x',
            '1.8.x',
            '1.8.1.x',
            '1.7.x',
            '1.6.x',
            '1.5.x',
            '1.4.2',
            '1.4.1.x',
            '1.4.0.x',
            '1.3.x',
            '1.2.x',
            '1.1.x'
        ];

        // Magento Extensions
        $MagentoExtensionsCheckValue = [
            'AMP',
            'Ajax Cart',
            'Ajax Catalog',
            'Ajax Compare',
            'Ajax Search',
            'Ajax Wishlist',
            'Blog',
            'Catalog Images Grid',
            'Cloud Zoom',
            'Custom Menu',
            'Custom Tab',
            'Facebook page plugin',
            'Featured Products',
            'Film Slider',
            'Google Map',
            'Image Zoom',
            'Layout Switcher',
            'MegaMenu',
            'Newsletter popup',
            'Parallax and Video Background',
            'Promo Banner',
            'Quick View',
            'Sale Products',
            'Sample Data Installer',
            'Shop by Brand',
            'Site Maintenance',
            'Smart Product Labels',
            'Social Icons',
            'Social Login',
            'Social Sharing',
            'Special Price Countdown',
            'Theme Options',
            'Twitter plugin'
        ];

        // Prestashop Engine
        $PrestashopEngineCheckValue = [
            '1.7.8.6',
            '1.7.8.5',
            '1.7.8.4',
            '1.7.8.3',
            '1.7.8.2',
            '1.7.8.1',
            '1.7.8.0',
            '1.7.7.8',
            '1.7.7.7',
            '1.7.7.6',
            '1.7.7.5',
            '1.7.7.4',
            '1.7.7.3',
            '1.7.7.2',
            '1.7.7.1',
            '1.7.6.9',
            '1.7.6.8',
            '1.7.6.7',
            '1.7.6.6',
            '1.7.6.5',
            '1.7.6.4',
            '1.7.6.3',
            '1.7.6.2',
            '1.7.5.2',
            '1.7.5.1',
            '1.7.5.0',
            '1.7.4.4',
            '1.7.4.3',
            '1.7.4.2',
            '1.7.4.1',
            '1.7.4',
            '1.7.3.3',
            '1.7.3.1',
            '1.7.3.0',
            '1.7.2.4',
            '1.7.1.1',
            '1.7.1.0',
            '1.7',
            '1.6.1.9',
            '1.6.1.8',
            '1.6.1.7',
            '1.6.1.6',
            '1.6.1.5',
            '1.6.1.4',
            '1.6.1.3',
            '1.6.1.2',
            '1.6.1.16',
            '1.6.1.15',
            '1.6.1.14',
            '1.6.1.13',
            '1.6.1.12',
            '1.6.1.11',
            '1.6.1.1',
            '1.6.1.0',
            '1.6.0.9',
            '1.6.0.6',
            '1.6.0.5',
            '1.6.0.4',
            '1.6.0.3',
            '1.6.0.14',
            '1.6.0.11',
            '1.6 & 1.7',
            '1.5.6.2',
            '1.5.6.1',
            '1.5.6.0',
            '1.5.5.0',
            '1.5.4.1',
            '1.5.4.0',
            '1.5.3.1',
            '1.5.2.0',
            '1.5.1.0',
            '1.5.0.17',
            '1.4.9.x',
            '1.4.8.2',
            '1.4.7.x',
            '1.4.7.3',
            '1.4.6.x',
            '1.4.5.x',
            '1.4.4.x',
            '1.4.3.x',
            '1.4.2.x',
            '1.4.1.x',
            '1.4.0.x',
            '1.3.6.x',
            '1.3.4.x',
            '1.3.2.x',
            '1.3.1.x'
        ];

        // PrestaShop Compatibility
        $PrestaShopCompatibilityCheckValue = [
            '1.7.x',
            '1.7.8.x',
            '1.7.7.x',
            '1.7.6.x',
            '1.7.5',
            '1.7.4.3',
            '1.7.4',
            '1.7.3.3',
            '1.7.3.1',
            '1.7.3.0',
            '1.7.2.4',
            '1.6.x',
            '1.6 & 1.7',
            '1.5.x',
            '1.5.3.1',
            '1.5.2.0',
            '1.5.1.0',
            '1.5.0.17',
            '1.4.9.x',
            '1.4.8.x',
            '1.4.7.x',
            '1.4.6.x',
            '1.4.5.x',
            '1.4.4.x',
            '1.4.3.x',
            '1.4.2.x',
            '1.4.1.x',
            '1.4.0.x',
            '1.3.6.x',
            '1.3.5.x',
            '1.3.4.x',
            '1.3.3.x',
            '1.3.2.x',
            '1.3.1.x'
        ];

        // Opencart Engine
        $OpencartEngineChecKValue = [
            '4.0.0.0',
            '3.0.3.8',
            '3.0.3.7',
            '3.0.3.6',
            '3.0.3.5',
            '3.0.3.3',
            '3.0.3.2',
            '3.0.2.0',
            '2.3',
            '2.2',
            '2.1.x',
            '2.0.3.1',
            '2.0.1.0',
            '2.0.0.0',
            '1.5.6.4',
            '1.5.6.3',
            '1.5.6.2',
            '1.5.6.1',
            '1.5.6',
            '1.5.5.1',
            '1.5.4.1',
            '1.5.3.1',
            '1.5.2.1',
            '1.5.1.3'
        ];

        // Opencart Compatibility
        $OpencartCompatibilityCheckValue = [
            '4.0.0.0',
            '3.0.3.8',
            '3.0.3.7',
            '3.0.3.6',
            '3.0.3.5',
            '3.0.3.3',
            '3.0.3.2',
            '3.0.2.0',
            '2.3',
            '2.2',
            '2.1.x',
            '2.0.3.1',
            '2.0.1.0',
            '2.0.0.0',
            '1.5.6.4',
            '1.5.6.3',
            '1.5.6.2',
            '1.5.6.1',
            '1.5.6',
            '1.5.5.1',
            '1.5.4.1',
            '1.5.3.1',
            '1.5.2.1',
            '1.5.1.3'
        ];

        // OpenCart Modules
        $OpenCartModulesCheckValue = [
            'Account',
            'Affiliate',
            'Banner',
            'Bestsellers',
            'Camera Slideshow',
            'Carousel',
            'Category',
            'Featured',
            'Google Talk',
            'Information',
            'Latest',
            'Manufacturer',
            'Slideshow',
            'Specials',
            'Store',
            'VQmod',
            'Welcome'
        ];

        // Zen Cart Compatibility
        $ZenCartCompatibilityCheckValue = [
            '1.5.6-1.5.7',
            '1.3.9 Only',
            '1.3.8-1.5.4'
        ];

        // Joomla Compatibility
        $JoomlaCompatibilityCheckValue = [
            '4.1.x',
            '4.0.x',
            '3.9.x',
            '3.2.1',
            '3.2.0-3.8.x',
            '3.2.0',
            '3.10.x',
            '3.1.5',
            '3.1.1',
            '3.0.x-3.5.x',
            '3.0.2',
            '3.0.1',
            '2.5.9',
            '2.5.8',
            '2.5.7',
            '2.5.27',
            '2.5.17',
            '2.5.16',
            '2.5.14',
            '2.5.11',
            '2.5.10',
            '2.5.0 - 2.5.x',
            '1.7.x - 2.5.14',
            '1.6.x - 2.5.x',
            '1.5.x',
            '1.0.x - 1.5.x'
        ];

        // Joomla Builder
        $JoomlaBuilderCheckValue = [
            'SP Page Builder',
            'T3 Framework'
        ];

        // Virtuemart Compatibility
        $VirtuemartCompatibilityCheckValue = [
            '3.8.x',
            '3.6.x',
            '3.6.0',
            '3.4.3',
            '3.2',
            '3.0.x',
            '3.0.9',
            '3.0.19',
            '3.0.18',
            '3.0.17',
            '3.0.14',
            '3.0.12',
            '2.9.9.2',
            '2.6.10',
            '2.6',
            '2.0.x',
            '2.0.8e',
            '2.0.6',
            '2.0.26d',
            '2.0.24',
            '2.0.22d',
            '2.0.22 - 2.6.x',
            '2.0.20b',
            '2.0.2',
            '2.0.18',
            '2.0.16d',
            '2.0.14',
            '2.0.12 - 2.0.21',
            '2.0.10',
            '1.1.4 - 1.1.9'
        ];

        // Drupal Engine
        $DrupalEngineCheckValue = [
            '9.0.0',
            '8.9.0',
            '8.8.0',
            '8.7.0',
            '8.6.0',
            '8.5.0',
            '8.4.0',
            '8.3.7',
            '8.3.6',
            '8.3.5',
            '8.2.4',
            '7.x',
            '7.56',
            '7.55',
            '7.54',
            '7.4',
            '7.34',
            '7.33',
            '7.31',
            '7.30',
            '7.29',
            '7.28',
            '7.27',
            '7.26',
            '7.25',
            '7.24',
            '7.23',
            '7.22',
            '7.21',
            '7.20',
            '7.2',
            '7.19',
            '7.18',
            '7.0',
            '6.x',
            '6.3',
            '6.19',
            '6.17',
            '6.16',
            '6.15',
            '6.14',
            '6.13',
            '6.12',
            '6.11',
            '6.0'
        ];

        // Drupal Compatibility
        $DrupalCompatibility = [
            '9.x',
            '8.x',
            '7.x',
            '6.x'
        ];

        // Product Features
        $ProductFeaturesCheckValue = [
            'Accelerated Mobile Pages (AMP)',
            'Admin Panel',
            'Advanced Theme Options',
            'Ajax',
            'Background video',
            'Blog',
            'Bootstrap',
            'CV',
            'Canvas Animation',
            'Completely JS',
            'Drag and Drop Content',
            'Dropdown Menu',
            'Dropshipping',
            'Events Calendar',
            'Forum',
            'GPL License',
            'Gallery',
            'Google map',
            'HTML 5',
            'HTML plus JS',
            'Hotel Booking',
            'JQuery',
            'Lazy Load effect',
            'Light Template',
            'MegaMenu',
            'Mobile Layout Included',
            'Moto CMS Landing Builder',
            'MotoCertificate',
            'MotoCorporate',
            'Multipurpose',
            'Novi Builder',
            'On-line chat',
            'One Page Templates',
            'Online Store/Shop',
            'Parallax',
            'Performance Optimization',
            'Portfolio',
            'Premium',
            'Quickstart Package',
            'Real Estate Catalog',
            'Responsive',
            'Restaurant Menu',
            'Retina Ready',
            'Right to left language support',
            'Sample content',
            'Search Engine Friendly',
            'Single Product',
            'Sliced PSD',
            'Static',
            'Tabs',
            'Team Members',
            'Themes Bundle',
            'Website Builder',
            'eCommerce',
            'j2store'
        ];

        // Color
        $ColorCheckValue = [
            'black',
            'blue',
            'brown',
            'cyan',
            'green',
            'grey',
            'orange',
            'pink',
            'purple',
            'red',
            'white',
            'yellow'
        ];

        // Images Included
        $ImagesIncludedCheckValue = [
            'Yes',
            'No',
        ];

        // Tools Needed to Use the Product
        $ToolsNeededtoUsetheProductCheckValue = [
            '.wav editor',
            '3D Stroke Plugin',
            '3dsMax 5.1+',
            '3dsMax 7+',
            '3dsMax 8',
            'Adobe After Effects CS4',
            'Adobe After Effects CS5',
            'Adobe After Effects CS6',
            'Adobe Fireworks MX+',
            'Adobe Flash 8',
            'Adobe Flash 8+',
            'Adobe Flash CS3',
            'Adobe Flash CS4',
            'Adobe Flash CS5',
            'Adobe Flash MX',
            'Adobe Flash MX 2004 only',
            'Adobe Flash MX only',
            'Adobe Flash MX+',
            'Adobe Illustrator 8+',
            'Adobe Illustrator CS2',
            'Adobe InDesign CC+',
            'Adobe Muse 2017',
            'Adobe Muse 2018',
            'Adobe Muse CC 2014',
            'Adobe Muse CC 2015',
            'Adobe Photoshop 5.5+',
            'Adobe Photoshop CC+',
            'Adobe Photoshop CS2',
            'Any sound editor',
            'Apache 1.3.x and MySQL 3.2+',
            'Apache 2+',
            'Apache 2.0 or higher',
            'Apache 2.0+',
            'Apache 2.2 or 2.4',
            'Apache 2.4',
            'Apache Server',
            'Apache Web Server 1.3+ with mod_ssl',
            'Apache only',
            'Apache server with the mod_rewrite module
    Apache server supporting .htaccess files
    PHP 5.0.0 version or higher
    PHP extensions: mysql, json, curl
    File manager - FTP access',
            'Blend 3',
            'CRE LOADED 6.2 STANDARD AND PRO',
            'Clean install without sample data',
            'Code editing tool',
            'Code editor',
            'Corel Draw 11+',
            'Corel Draw 12+',
            'Corel Draw 9+',
            'CreLoaded 6.2 patch 13 only',
            'Drupal 6.0',
            'Drupal 6.11',
            'Drupal 6.12',
            'Drupal 6.13',
            'Drupal 6.14',
            'Drupal 6.15',
            'Drupal 6.16',
            'Drupal 6.17',
            'Drupal 6.19',
            'Drupal 6.3',
            'Drupal 6.x',
            'Drupal 7.0',
            'Drupal 7.2',
            'Drupal 7.x',
            'Drupal 8.x',
            'FTP access',
            'Facebook Account',
            'Figma',
            'Flash 2004',
            'Flash 2004 or higher',
            'Flash player v. 9',
            'ZIP package',
            'Google Web Designer',
            'Hosting PHP4x and MySQL4x',
            'Hosting PHP5.2-5.4 and MySQL5x',
            'Hosting PHP5x and MySQL5x',
            'Hosting SSL Certificate Enabled',
            'JigoShop 1.4.1',
            'JigoShop 1.4.9',
            'JigoShop 1.5',
            'JigoShop 1.6',
            'JigoShop 1.6.1',
            'JigoShop 1.6.2',
            'JigoShop 1.6.3',
            'JigoShop 1.6.5',
            'JigoShop 1.7',
            'JigoShop 1.7.3',
            'JigoShop 1.8',
            'Joomla! 1.0',
            'Joomla! 1.5.0',
            'Joomla! 1.5.x',
            'Joomla! 1.6.0',
            'Joomla! 1.6.3',
            'Joomla! 1.6.5',
            'Joomla! 1.6.x',
            'Joomla! 1.7.0',
            'Joomla! 1.7.1',
            'Joomla! 1.7.2',
            'Joomla! 1.7.3',
            'Joomla! 2.5.0',
            'Joomla! 2.5.1',
            'Joomla! 2.5.10',
            'Joomla! 2.5.11',
            'Joomla! 2.5.16',
            'Joomla! 2.5.17',
            'Joomla! 2.5.2',
            'Joomla! 2.5.27',
            'Joomla! 2.5.3',
            'Joomla! 2.5.4',
            'Joomla! 2.5.6',
            'Joomla! 2.5.7',
            'Joomla! 2.5.8',
            'Joomla! 2.5.9',
            'Joomla! 3.0.1',
            'Joomla! 3.0.2',
            'Joomla! 3.0.3',
            'Joomla! 3.1.1',
            'Joomla! 3.1.5',
            'Joomla! 3.2',
            'Joomla! 3.2.1',
            'Joomla! 3.2.2',
            'Joomla! 3.2.3',
            'Joomla! 3.3.0',
            'Joomla! 3.3.1',
            'Joomla! 3.3.3',
            'Joomla! 3.3.4',
            'Joomla! 3.3.6',
            'Joomla! 3.4.x',
            'Joomla! 3.9x',
            'Joomla! 4.0.x',
            'Joomla! 4.1.x',
            'Loaded7 V7.001.0.0',
            'Magento 1.1.6',
            'Magento 1.1.7',
            'Magento 1.1.8',
            'Magento 1.2.x',
            'Magento 1.3.0',
            'Magento 1.3.2.x',
            'Magento 1.3.x',
            'Magento 2.2.7',
            'Magento 2.3.0',
            'Magento 2.3.1',
            'Magento 2.3.2',
            'Magento community edition 1.4.0',
            'Magento community edition 1.4.1.x',
            'Magento community edition 1.4.2.x',
            'Magento community edition 1.5.0.x',
            'Magento community edition 1.5.1.x',
            'Magento community edition 1.6.0.x',
            'Magento community edition 1.6.1.x',
            'Magento community edition 1.6.2.x',
            'Magento community edition 1.7.0.x',
            'Magento community edition 1.8.0.x',
            'Magento community edition 1.8.1.x',
            'Magento community edition 1.9.x',
            'Mambo 4.6.2',
            'Microsoft Expression Blend 4',
            'MySQL 4.1.13+, PHP 5.3+',
            'MySQL 4.1.14 or later',
            'MySQL 4.1.14+',
            'MySQL 4.1.3 or higher',
            'MySQL 4.1.3+',
            'MySQL 5.6',
            'MySQL 5.7',
            'MySQL 8',
            'extensions .php, .inc, .zip, .css, .js',
            'No additional plugins required',
            'Notepad++ or any php-editor',
            'OpenCart 1.5.1.3',
            'OpenCart 1.5.2.1',
            'OpenCart 1.5.3.1',
            'OpenCart 1.5.4.1',
            'OpenCart 1.5.5.1',
            'OpenCart 1.5.6',
            'OpenCart 1.5.6.1',
            'OpenCart 1.5.6.2',
            'OpenCart 1.5.6.3',
            'OpenCart 1.5.6.4',
            'OpenCart 2.0.1.0',
            'OpenCart 2.0.3.1',
            'OpenCart 3.0.2.0',
            'OsCommerce 2.3.1',
            'OsCommerce 2.3.3',
            'OsCommerce 2.3.4',
            'PHP 4.3.2+',
            'PHP 5+',
            'PHP 5.0+',
            'PHP 5.2.14 or higher',
            'PHP 5.2.14+',
            'PHP 5.3+',
            'PHP 5.4+',
            'PHP 5.6.5-5.6x',
            'PHP 7.0.2',
            'PHP 7.0.4',
            'PHP 7.0.6.-7.0.x',
            'PHP 7.1.3+',
            'PHP 7.1.x',
            'PHP 7.2.x',
            'PHP 7.3.x',
            'PHP 7.4.x',
            'PHP 8.0.x',
            'PHP code editor',
            'PHP configured to support CURL with OpenSSL',
            'PHP editing tool',
            'PHP editor',
            'PHP editor.',
            'PHP supporting CURL with OpenSSL',
            'PHP v. 5 or higher',
            'PHP-EDITOR',
            'Paid WP Job Manager Plugin',
            'Paypal Only',
            'PhpBB2 board',
            'PowerPoint 2003 or 2007 (better)',
            'Powerpoint 2007 (recommended) or Powerpoint 2003',
            'PrestaShop 1.7.x',
            'Prestashop 1.3.1.x',
            'Prestashop 1.3.2.x',
            'Prestashop 1.3.4.x',
            'Prestashop 1.3.6.x',
            'Prestashop 1.4.0.x',
            'Prestashop 1.4.1.x',
            'Prestashop 1.4.2.x',
            'Prestashop 1.4.4.x',
            'Prestashop 1.4.5.x',
            'Prestashop 1.4.6.x',
            'Prestashop 1.4.7.3',
            'Prestashop 1.4.7.x',
            'Prestashop 1.4.8.2',
            'Prestashop 1.4.9.x',
            'Prestashop 1.5.0.17',
            'Prestashop 1.5.1.0',
            'Prestashop 1.5.2.0',
            'Prestashop 1.5.3.1',
            'Prestashop 1.5.4.0',
            'Prestashop 1.5.4.1',
            'Prestashop 1.5.5.0',
            'Prestashop 1.5.6.0',
            'Prestashop 1.5.6.1',
            'Prestashop 1.5.6.2',
            'Prestashop 1.6.0.11',
            'Prestashop 1.6.0.14',
            'Prestashop 1.6.0.4',
            'Prestashop 1.6.0.5',
            'Prestashop 1.6.0.6',
            'Prestashop 1.6.0.9',
            'Prestashop 1.6.1.0',
            'Prestashop 1.6.1.4',
            'Right to Left version included',
            'Runs on most server configurations',
            'SUPPORT .php, .inc,  .zip, .css, .js - files',
            'SWISHMAX 2004.09.10',
            'SWISHMAX 2006.06.29',
            'SWiSHmax 2.0 Build 2007.09.25',
            'SWiSHmax 2.0 Build 2007.11.02',
            'SWiSHmax 2.0 Build 2008.01.31',
            'SWiSHmax 2.0 Build 2008.08.12',
            'SWiSHmax 2.0 Build 2009.06.02',
            'SWiSHmax 3 Build 2009.11.30',
            'SWiSHmax 3.0 Build 2009.09.04',
            'SWiSHmax 4 build 2010.11.02',
            'SWiSHmax 4 build 2011.03.18',
            'Sketch',
            'Sublime Text2 or later, Notepad++',
            'Sublime Text2 or later, Notepad++ or any php-editor',
            'Supported by the current versions of popular browsers',
            'Sure Target 2 Plugin',
            'Sure Target Plugin',
            'TRAPCODE PARTICULAR PLUGIN',
            'Linux Operating System',
            'Trapcode 3D Stroke Plugin',
            'Trapcode: Form Plugin',
            'Twitch Plugin',
            'VC Reflect Plugin',
            'Version with Trapcode Particular included',
            'Virtuemart 1.1.4',
            'Virtuemart 1.1.6',
            'Virtuemart 1.1.7',
            'Virtuemart 1.1.8',
            'Virtuemart 1.1.9',
            'Virtuemart 2.0.10',
            'Virtuemart 2.0.12',
            'Virtuemart 2.0.14',
            'Virtuemart 2.0.16d',
            'Virtuemart 2.0.18',
            'Virtuemart 2.0.2',
            'Virtuemart 2.0.20b',
            'Virtuemart 2.0.22a',
            'Virtuemart 2.0.22d',
            'Virtuemart 2.0.24',
            'Virtuemart 2.0.26d',
            'Virtuemart 2.0.6',
            'Virtuemart 2.0.8e',
            'Virtuemart 2.0.x',
            'Virtuemart 2.6',
            'Virtuemart 2.6.10',
            'Virtuemart 2.9.9.2',
            'Virtuemart 3.0',
            'Virtuemart 3.0.x',
            'Visual Studio',
            'WebMatrix',
            'WooCommerce 2.0.14',
            'WooCommerce 2.0.18',
            'WooCommerce 2.0.19',
            'WooCommerce 2.1.12',
            'WooCommerce 2.1.9',
            'WooCommerce 2.3.x',
            'WooCommerce 3.0.x',
            'WooCommerce 3.1.x',
            'WooCommerce 3.x',
            'WordPress 2.1.x',
            'WordPress 2.3.x',
            'WordPress 2.6',
            'WordPress 2.7',
            'WordPress 2.8',
            'WordPress 2.9',
            'WordPress 3.0',
            'WordPress 3.1',
            'WordPress 3.1.3',
            'WordPress 3.2.1',
            'WordPress 3.3',
            'WordPress 3.3.1',
            'WordPress 3.3.2',
            'WordPress 3.4.x',
            'WordPress 3.5+',
            'WordPress 3.5.x',
            'WordPress 3.6.x',
            'WordPress 3.7.x',
            'WordPress 3.8.x',
            'WordPress 3.9.x',
            'WordPress 4.0.x',
            'WordPress 4.1.x',
            'WordPress 4.2.x',
            'WordPress 4.2.x-4.9.x',
            'WordPress 4.3.x',
            'WordPress 5.0-5.2.x',
            'WordPress 5.6.x',
            'WordPress 5.7.x',
            'WordPress 5.8.x',
            'WordPress 5.9.x',
            'WordPress 6.0.x',
            'Wordpress 2.0.1 - 2.0.5',
            'ZIP archivator',
            'ZIP unarchiver',
            'Zen Cart 1.3.6 only',
            'Zen Cart 1.3.8 only',
            'Zen Cart 1.3.9 only',
            'Zen Cart 1.5.x',
            'magento 2.2.2',
            'magento 2.2.3',
            'nginx 1.8',
            'nginx 1.x',
            'only 6.5-7.8 and 8.0 version supported',
            'osCommerce  v2.2',
            'osCommerce 2.2 MS2',
            'osCommerce v2.2 RC2a'
        ];

        // Web Forms
        $WebFormsCheckValue = [
            'Advanced Search',
            'Booking Form',
            'Contact Form',
            'Login Form',
            'Newsletter Subscription',
            'Search Form',
            'User Registration'
        ];

        // Currencies
        $CurrenciesCheckValue = [
            'EUR',
            'GBP',
            'USD'
        ];

        // Language Support
        $LanguageSupportCheckValue = [
            'Deutsch',
            'Dutch',
            'English',
            'French',
            'German',
            'Italian',
            'Japanese',
            'Polish',
            'Portuguese (Brazilian)',
            'Russian',
            'Spanish',
            'Swedish',
            'Ukrainian'
        ];

        if (isset($_POST['categoryProductsBtn'])) {
            $category = $_POST['category'];

            if (!empty($_POST['AddProductAsFree']) && $_POST['AddProductAsFree'] == 'on') {
                $ProductSellAsFree  = true;
            } else {
                $ProductSellAsFree  = false;
            }

            $sql = "SELECT * FROM category";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $allTag = array();

            // Shopify Theme
            $AllowedThemeArchitectureVersion = ['ShopifyTheme']; // Theme Architecture Version

            // Stock Music
            $AllowedTempoBPM = ['StockMusic']; // Tempo(BPM)
            $AllowedVocals = ['StockMusic']; // Vocals

            // After Effects
            $AllowedAfterEffectsVersion = ['AfterEffectsTemplates']; // AfterEffects Version

            // Magento
            $AllowedMagentoEngine = ['MagentoExtension', 'MagentoTheme']; // MagentoEngine
            $AllowedMagentoCompatibility = ['MagentoExtension', 'MagentoTheme']; // Magento Compatibility
            $AllowedMagentoExtensions = ['MagentoTheme']; // Magento Extensions

            // Prestashop
            $AllowedPrestashopEngine = ['PrestaShopModule', 'PrestaShopTheme']; // Prestashop Engine
            $AllowedPrestaShopCompatibility = ['PrestaShopModule', 'PrestaShopTheme']; // PrestaShop Compatibility

            // Elementor
            $AllowedElementorVersion = ['ElementorKit']; // Elementor Version

            // OpenCart
            $AllowedOpencartEngine = ['OpenCartTemplate']; // Opencart Engine
            $AllowedOpencartCompatibility = ['OpenCartTemplate']; // Opencart Compatibility
            $AllowedOpenCartModules = ['OpenCartTemplate']; // OpenCart Modules

            // MotoCMS Ecommerce
            $AllowedMotoCMSVersion = ['MotoCMSEcommerceTemplate', 'MotoCMS3Template']; // MotoCMS Version
            $AllowedMotoCMSWidgets = ['MotoCMSEcommerceTemplate', 'MotoCMS3Template']; // MotoCMS Widgets
            $AllowedMotoTrialType = ['MotoCMS3Template']; // Moto Trial Type

            // Zen Cart
            $AllowedZenCartCompatibility = ['ZenCartTemplate']; // Zen Cart Compatibility

            // Joomla
            $AllowedJoomlaCompatibility = ['VirtueMartTemplate', 'JoomlaTemplate']; // Joomla Compatibility
            $AllowedJoomlaBuilder = ['JoomlaTemplate']; // Joomla Builder

            // Virtuemart
            $AllowedVirtuemartCompatibility = ['VirtueMartTemplate']; // Virtuemart Compatibility

            // Drupal
            $AllowedDrupalEngine = ['DrupalTemplate']; // Drupal Engine
            $AllowedDrupalCompatibility = ['DrupalTemplate']; // Drupal Compatibility

            // wordpress
            $AllowedWordpressEngine = ['WordPressPlugin']; // Wordpress Engine
            $AllowedWordPressCompatibility = ['WordPressTheme', 'WooCommerceTheme', 'WordPressPlugin']; // WordPress Compatibility
            $AllowedWooCommerceCompatibility = ['WordPressTheme', 'WooCommerceTheme']; // WooCommerce Compatibility
            $AllowedWordPressBuilder = ['WordPressTheme', 'WooCommerceTheme', 'WordPressPlugin']; // WordPress Builder

            //General
            $AllowedCompatibleWith = ['WordPressTheme', 'WooCommerceTheme']; // Compatible With
            $AllowedProductFeatures = ['WordPressTheme', 'WooCommerceTheme', 'ElementorKit', 'WebsiteTemplate', 'LandingPageTemplate', 'NewsletterTemplate', 'AdminTemplate', 'SpecialityPage', 'MuseTemplate', 'ShopifyTheme', 'PrestaShopTheme', 'MagentoTheme', 'OpenCartTemplate', 'MotoCMSEcommerceTemplate', 'ZenCartTemplate', 'VirtueMartTemplate', 'BigCommerceThemes', 'JoomlaTemplate', 'DrupalTemplate', 'MotoCMS3Template', 'WordPressPlugin', 'PrestaShopModule', 'JavaScript', 'MagentoExtension', 'PowerPointTemplate', 'KeynoteTemplate', 'GoogleSlides', 'PSDTemplate']; // Product Features
            $AllowedStyles = ['WordPressTheme', 'WooCommerceTheme', 'WebsiteTemplate', 'LandingPageTemplate', 'NewsletterTemplate', 'AdminTemplate', 'SpecialityPage', 'MuseTemplate', 'ShopifyTheme', 'PrestaShopTheme', 'MagentoTheme', 'OpenCartTemplate', 'ZenCartTemplate', 'VirtueMartTemplate', 'BigCommerceThemes', 'JoomlaTemplate', 'DrupalTemplate']; // Styles
            $AllowedToolsNeededtoUsetheProduct = ['JavaScript', 'WordPressPlugin', 'MotoCMS3Template', 'DrupalTemplate', 'JoomlaTemplate', 'BigCommerceThemes', 'VirtueMartTemplate', 'ZenCartTemplate', 'MotoCMSEcommerceTemplate', 'OpenCartTemplate', 'WordPressTheme', 'WooCommerceTheme', 'WebsiteTemplate', 'LandingPageTemplate', 'NewsletterTemplate', 'AdminTemplate', 'SpecialityPage', 'MuseTemplate', 'ShopifyTheme', 'MagentoTheme', 'PrestaShopTheme', 'PrestaShopModule', 'MagentoExtension', 'PowerPointTemplate', 'KeynoteTemplate', 'GoogleSlides', 'InfographicElements']; // Tools Needed to Use the Product
            $AllowedColor = ['PowerPointTemplate', 'KeynoteTemplate', 'GoogleSlides']; // Color
            $AllowedImagesIncluded = ['MotoCMS3Template', 'DrupalTemplate', 'JoomlaTemplate', 'BigCommerceThemes', 'VirtueMartTemplate', 'ZenCartTemplate', 'MotoCMSEcommerceTemplate', 'OpenCartTemplate', 'WordPressTheme', 'WooCommerceTheme', 'WebsiteTemplate', 'LandingPageTemplate', 'NewsletterTemplate', 'AdminTemplate', 'SpecialityPage', 'MuseTemplate', 'PrestaShopTheme', 'ShopifyTheme', 'MagentoTheme', 'PowerPointTemplate', 'KeynoteTemplate', 'GoogleSlides', 'InfographicElements', 'PSDTemplate', 'AppTemplate']; // Images Included          
            $AllowedGraphicsType = ['LogoTemplate', 'IconsetTemplate', 'Fonts', 'PrintableResumeTemplates', 'UIElements', 'CorporateIdentityTemplate', 'CertificateTemplate', 'Illustration', 'SocialMedia', 'ProductMockup', 'Pattern', 'T-shirts', 'Background', 'Planner', 'MagazineTemplates']; // Graphics Type
            $AllowedIconStyles = ['IconsetTemplate']; // Icon Styles
            $AllowedCompatibility = ['LogoTemplate', 'IconsetTemplate', 'Fonts', 'PrintableResumeTemplates', 'AppTemplate', 'UIElements', 'CorporateIdentityTemplate', 'CertificateTemplate', 'Illustration', 'SocialMedia', 'ProductMockup', 'AnimatedBanner', 'Pattern', 'T-shirts', 'Background', 'Planner', 'Vectors', 'MagazineTemplates', '3DModels']; // Compatibility
            $AllowedFilesIncluded = ['LogoTemplate', 'IconsetTemplate', 'Fonts', 'PrintableResumeTemplates', 'AppTemplate', 'UIElements', 'CorporateIdentityTemplate', 'CertificateTemplate', 'Illustration', 'SocialMedia', 'ProductMockup', 'AnimatedBanner', 'Pattern', 'T-shirts', 'Background', 'Planner', 'Vectors', 'MagazineTemplates', 'StockVideo', 'StockMotionGraphics', 'AfterEffectsTemplates', 'PremiereProTemplates', 'FinalCutProTemplates', 'MotionGraphicsTemplates', 'DaVinciResolveTemplates', 'StockMusic', 'SoundEffects', '3DModels']; // Files Included
            $AllowedLength = ['StockVideo', 'StockMotionGraphics', 'AfterEffectsTemplates', 'PremiereProTemplates', 'FinalCutProTemplates', 'MotionGraphicsTemplates', 'DaVinciResolveTemplates', 'StockMusic', 'SoundEffects']; //Length
            $AllowedResolution = ['StockVideo', 'StockMotionGraphics', 'AfterEffectsTemplates', 'PremiereProTemplates', 'FinalCutProTemplates', 'MotionGraphicsTemplates', 'DaVinciResolveTemplates']; // Resolution
            $AllowedSoftwareVersion = ['PremiereProTemplates', 'FinalCutProTemplates']; // Software Version
            $AllowedFeatures = ['3DModels']; // Features
            $AllowedPolygonCount = ['3DModels']; // PolygonCount
            $AllowedBootstrapVersion = ['WebsiteTemplate', 'LandingPageTemplate']; // Bootstrap Version
            $AllowedEmailSystemsCompatibility = ['NewsletterTemplate', 'MotoCMS3Template']; // Email Systems Compatibility
            $AllowedCurrencies = ['MotoCMSEcommerceTemplate', 'PrestaShopTheme', 'MagentoTheme', 'OpenCartTemplate']; // Currencies
            $AllowedLanguageSupport = ['MotoCMSEcommerceTemplate', 'PrestaShopTheme', 'OpenCartTemplate']; // Language Support
            $AllowedWebForms = ['MotoCMS3Template']; // Web Forms

            $i = 0;
            if ($result->num_rows > 0) {
                //output data of each row
                while ($row = $result->fetch_assoc()) {
                    $allTag[$i] = $row['tag'];
                    $i++;
                }
            }

            if (in_array($category, $allTag)) {
                if (!empty($category)) {
                    $next_to_addProduct = true;
                }
            }
        }

        if (isset($_POST['validate_data'])) {
            $GenerateProductID = uniqid();
            $GenerateMainImageID = uniqid();
            $GenerateSlider1ID = uniqid();
            $GenerateSlider2ID = uniqid();
            $GenerateSlider3ID = uniqid();
            $GenerateSlider4ID = uniqid();
            $GenerateFileID = uniqid();

            // WordPress
            $WordPressEngine = $_POST['WordPressEngine'];
            $WordPressCompatibility = $_POST['WordPressCompatibility'];
            $WordPressBuilder = $_POST['WordPressBuilder'];

            // WooCommerce
            $WooCommerceCompatibility = $_POST['WooCommerceCompatibility'];

            // OpenCart
            $OpencartEngine = $_POST['OpencartEngine'];
            $OpencartCompatibility = $_POST['OpencartCompatibility'];
            $OpenCartModules = $_POST['OpenCartModules'];

            // PrestaShop
            $PrestashopEngine = $_POST['PrestashopEngine'];
            $PrestaShopCompatibility = $_POST['PrestaShopCompatibility'];

            // Magento
            $MagentoEngine = $_POST['MagentoEngine'];
            $MagentoCompatibility = $_POST['MagentoCompatibility'];
            $MagentoExtensions = $_POST['MagentoExtensions'];

            // MotoCMS
            $MotoCMSVersion = $_POST['MotoCMSVersion'];
            $MotoCMSWidgets = $_POST['MotoCMSWidgets'];

            // Elementor
            $ElementorVersion = $_POST['ElementorVersion'];

            $ZenCartCompatibility = $_POST['ZenCartCompatibility'];
            $JoomlaCompatibility = $_POST['JoomlaCompatibility'];
            $JoomlaBuilder = $_POST['JoomlaBuilder'];
            $VirtuemartCompatibility = $_POST['VirtuemartCompatibility'];

            // General
            $actualDate = date("Y.m.d");
            $productName = $_POST['product_name'];
            $LiveDemo = $_POST['Live_Demo'];
            $GetCategory = $_POST['GetCategory'];
            $description = $_POST['trumbowyg-demo'];
            $Vocals = $_POST['Vocals'];
            $CompatibleWith = $_POST['CompatibleWith'];
            $ProductFeatures = $_POST['ProductFeatures'];
            $Styles = $_POST['Styles'];
            $ToolsNeededtoUsetheProduct = $_POST['ToolsNeededtoUsetheProduct'];
            $Color = $_POST['Color'];
            $ImagesIncluded = $_POST['ImagesIncluded'];
            $GraphicsType = $_POST['GraphicsType'];
            $IconStyles = $_POST['IconStyles'];
            $Compatibility = $_POST['Compatibility'];
            $FilesIncluded = $_POST['FilesIncluded'];
            $Length = $_POST['Length'];
            $Resolution = $_POST['Resolution'];
            $SoftwareVersion = $_POST['SoftwareVersion'];
            $Features = $_POST['Features'];
            $PolygonCount = $_POST['PolygonCount'];
            $BootstrapVersion = $_POST['BootstrapVersion'];
            $EmailSystemsCompatibility = $_POST['EmailSystemsCompatibility'];
            $Currencies = $_POST['Currencies'];
            $LanguageSupport = $_POST['LanguageSupport'];
            $WebForms = $_POST['WebForms'];
            $tags_normal = $_POST['tags'];
            $ProductPrice = $_POST['ProductPrice'];
            $UploadToTemplatePlus = $_POST['AddToTemplatePlusSubscription'];
            $Support = $_POST['Support'];

            // extension/plugins Multiple Select

            if (isset($Vocals)) {
                $NewVocals = implode(', ', $Vocals);
            }

            if (isset($MagentoCompatibility)) {
                $NewMagentoCompatibility = implode(', ', $MagentoCompatibility);
            }

            if (isset($MagentoExtensions)) {
                $NewMagentoExtensions = implode(', ', $MagentoExtensions);
            }

            if (isset($PrestaShopCompatibility)) {
                $NewPrestaShopCompatibility = implode(', ', $PrestaShopCompatibility);
            }

            if (isset($OpencartCompatibility)) {
                $NewOpencartCompatibility = implode(', ', $OpencartCompatibility);
            }

            if (isset($OpenCartModules)) {
                $NewOpenCartModules = implode(', ', $OpenCartModules);
            }

            if (isset($MotoCMSWidgets)) {
                $NewMotoCMSWidgets = implode(', ', $MotoCMSWidgets);
            }

            if (isset($ZenCartCompatibility)) {

                $NewZenCartCompatibility = implode(', ', $ZenCartCompatibility);
            }

            if (isset($JoomlaCompatibility)) {
                $NewJoomlaCompatibility =  implode(', ', $JoomlaCompatibility);
            }

            if (isset($JoomlaBuilder)) {
                $NewJoomlaBuilder = implode(', ', $JoomlaBuilder);
            }

            if (isset($VirtuemartCompatibility)) {
                $NewVirtuemartCompatibility = implode(', ', $VirtuemartCompatibility);
            }

            if (isset($DrupalCompatibility)) {
                $NewDrupalCompatibility = implode(', ', $DrupalCompatibility);
            }

            if (isset($WordPressCompatibility)) {
                $NewWordPressCompatibility = implode(', ', $WordPressCompatibility);
            }

            if (isset($WooCommerceCompatibility)) {
                $NewWooCommerceCompatibility = implode(', ', $WooCommerceCompatibility);
            }

            if (isset($WordPressBuilder)) {
                $NewWordPressBuilder = implode(', ', $WordPressBuilder);
            }

            if (isset($CompatibleWith)) {
                $NewCompatibleWith = implode(', ', $CompatibleWith);
            }

            if (isset($ProductFeatures)) {
                $NewProductFeatures = implode(', ', $ProductFeatures);
            }

            if (isset($Styles)) {
                $NewStyles = implode(', ', $Styles);
            }

            if (isset($ToolsNeededtoUsetheProduct)) {
                $NewToolsNeededtoUsetheProduct = implode(', ', $ToolsNeededtoUsetheProduct);
            }

            if (isset($Color)) {
                $NewColor = implode(', ', $Color);
            }

            if (isset($GraphicsType)) {
                $NewGraphicsType = implode(', ', $GraphicsType);
            }

            if (isset($IconStyles)) {
                $NewIconStyles = implode(', ', $IconStyles);
            }

            if (isset($Compatibility)) {
                $NewCompatibility = implode(', ', $Compatibility);
            }

            if (isset($FilesIncluded)) {
                $NewFilesIncluded = implode(', ', $FilesIncluded);
            }

            if (isset($SoftwareVersion)) {
                $NewSoftwareVersion = implode(', ', $SoftwareVersion);
            }

            if (isset($Features)) {
                $NewFeatures = implode(', ', $Features);
            }

            if (isset($EmailSystemsCompatibility)) {
                $NewEmailSystemsCompatibility = implode(', ', $EmailSystemsCompatibility);
            }

            if (isset($Currencies)) {
                $NewCurrencies = implode(', ', $Currencies); #

            }

            if (isset($LanguageSupport)) {
                $NewLanguageSupport = implode(', ', $LanguageSupport);
            }

            if (isset($WebForms)) {
                $NewWebForms = implode(', ', $WebForms);
            }
            // end extension/plugins


            if (isset($_POST['SellFree'])) {
                $ProductPrice = 0;
            }

            if ($UploadToTemplatePlus == 'on') {
                $UploadToTemplatePlus = 1;
            } else {
                $UploadToTemplatePlus = 0;
            }

            if (empty($UploadToTemplatePlus)) {
                $UploadToTemplatePlus = 0;
            }

            if ($Support == 'on') {
                $Support = 1;
            } else {
                $Support = 0;
            }

            if (empty($Support)) {
                $Support = 0;
            }

            if (!empty($_FILES['MainFile']['name'])) {
                $MainFile = $_FILES['MainFile'];
                $MainFileId = uniqid();
                $MainFileName = $_FILES['MainFile']['name'];
                $MainFileSize = $_FILES['MainFile']['size'];
                $MainFileExtension = $_FILES['MainFile']['type'];
                $MainFileTemporary_location = $_FILES['MainFile']['tmp_name'];
                $MainFileLocation = 'private/ProductFile/' . $MainFileId . '.zip';
            }

            $MainImageName = $_FILES['MainImage']['name'];
            $Slider1 = $_FILES['Slider1']['name'];
            $slider2 = $_FILES['Slider2']['name'];
            $slider3 = $_FILES['Slider3']['name'];
            $slider4 = $_FILES['Slider4']['name'];

            if (!empty($MainImageName)) {
                $MainImageData = addslashes(file_get_contents($_FILES['MainImage']['tmp_name']));
                $MainImageProperties = getimageSize($_FILES['MainImage']['tmp_name']);
            }

            if (!empty($Slider1)) {
                $Slider1Data = addslashes(file_get_contents($_FILES['Slider1']['tmp_name']));
                $Slider1Properties = getimageSize($_FILES['Slider1']['tmp_name']);
            }

            if (!empty($Slider2)) {
                $Slider2Data = addslashes(file_get_contents($_FILES['Slider2']['tmp_name']));
                $Slider2Properties = getimageSize($_FILES['Slider2']['tmp_name']);
            }

            if (!empty($slider3)) {
                $Slider3Data = addslashes(file_get_contents($_FILES['Slider3']['tmp_name']));
                $Slider3Properties = getimageSize($_FILES['Slider3']['tmp_name']);
            }

            if (!empty($slider4)) {
                $Slider4Data = addslashes(file_get_contents($_FILES['Slider4']['tmp_name']));
                $Slider4Properties = getimageSize($_FILES['Slider4']['tmp_name']);
            }

            $newtags = explode(' ', $tags_normal);
            $new = str_replace(',', ', ', $newtags);
            $tags = $new[0];

            $sql = "SELECT * FROM category";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $allTag = array();

            $i = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $allTag[$i] = $row['tag'];
                    $i++;
                }
            }

            switch ($GetCategory) {
                case 'WordPressTheme':
                    if (in_array($GetCategory, $allTag)) {
                        if (!empty($productName) && !empty($LiveDemo) && !empty($description) && !empty($_FILES['MainFile']['name']) && !empty($MainImageName) && !empty($Slider1) && !empty($slider2) && !empty($slider3) && !empty($slider4) && !empty($WordPressCompatibility) && !empty($WordPressBuilder) && !empty($WooCommerceCompatibility) && !empty($CompatibleWith) && !empty($Styles) && !empty($ProductFeatures) && !empty($ImagesIncluded) && !empty($ToolsNeededtoUsetheProduct) && !empty($tags) && !empty($ProductPrice) && is_numeric($ProductPrice)) {
                            if (Array_check_multiple_values($WordPressCompatibility, $WordPressCompatibilityCheckValue) && Array_check_multiple_values($WordPressBuilder, $WordPressBuilderCheckValue) && Array_check_multiple_values($WooCommerceCompatibility, $WooCommerceCompatibilityCheckValue) && Array_check_multiple_values($CompatibleWith, $CompatibleWithCheckValue) && Array_check_multiple_values($Styles, $StylesCheckValue)  && Array_check_multiple_values($ProductFeatures, $ProductFeaturesCheckValue) && in_array($ImagesIncluded, $ImagesIncludedCheckValue) && Array_check_multiple_values($ToolsNeededtoUsetheProduct, $ToolsNeededtoUsetheProductCheckValue)) {
                                move_uploaded_file($MainFileTemporary_location, $MainFileLocation);


                                /*
                                $myfile = fopen("private/.htaccess", "a") or die("Unable to open file!");
                                $txt = '
                                            <If "%{REQUEST_URI} =~ m#^/private/ProductFile/' . $MainFileId . '.zip($|/)#">
                                                allow from ' . $_SERVER['REMOTE_ADDR'] . '
                                            </If>
                                        ';
                                             fwrite($myfile, "\n" . $txt);
                                            fclose($myfile);

  */
                                $this->RunSql(
                                    "INSERT INTO products (`id`, `creator`,`category`,`createdtime`,`Product Name`,`Live Demo`,`description`,`Tags`,`Product Price`,`TemplatePlusProduct`,`Support`,`WordPress Compatibility`,`WordPress Builder`,`WooCommerce Compatibility`,`Compatible with`,`Styles`,`Product Features`,`Images Included`,`Tools Needed to Use the Product`) 
                                VALUE ('$GenerateProductID','$username', '$GetCategory', '$actualDate', '$productName', '$LiveDemo', '$description', '$tags', '$ProductPrice', '$UploadToTemplatePlus', '$Support', '$NewWordPressCompatibility', '$NewWordPressBuilder', '$NewWooCommerceCompatibility', '$NewCompatibleWith', '$NewStyles', '$NewProductFeatures', '$ImagesIncluded', '$NewToolsNeededtoUsetheProduct')",
                                    '',
                                    'INSERT',
                                    true
                                );

                                $this->RunSql(
                                    "INSERT INTO images (ImageId, imageType, imageData) VALUE ('$GenerateMainImageID','{$MainImageProperties['mime']}', '{$MainImageData}')",
                                    '',
                                    'INSERT',
                                    true
                                );

                                $this->RunSql(
                                    "INSERT INTO images (ImageId, imageType, imageData) VALUE ('$GenerateSlider1ID','{$Slider1Properties['mime']}', '{$Slider1Data}')",
                                    '',
                                    'INSERT',
                                    true
                                );

                                $this->RunSql(
                                    "INSERT INTO images (ImageId, imageType, imageData) VALUE ('$GenerateSlider2ID','{$Slider2Properties['mime']}', '{$Slider2Data}')",
                                    '',
                                    'INSERT',
                                    true
                                );

                                $this->RunSql(
                                    "INSERT INTO images (ImageId, imageType, imageData) VALUE ('$GenerateSlider3ID','{$Slider3Properties['mime']}', '{$Slider3Data}')",
                                    '',
                                    'INSERT',
                                    true
                                );

                                $this->RunSql(
                                    "INSERT INTO images (ImageId, imageType, imageData) VALUE ('$GenerateSlider4ID','{$Slider4Properties['mime']}', '{$Slider4Data}')",
                                    '',
                                    'INSERT',
                                    true
                                );
                            } else {
                                echo 'er';
                            }
                        } else {
                            echo 'Empty General Value';
                        }
                    }
                    break;
            }


            $sd = 'agtasdgds';
        }
    }
}

$controller = new UploaderController;
$main = new main;

?>
<!doctype HTML>
<html lang="en">

<head>
    <title>Upload Item</title>
    <?php $main->head(); ?>
    <style>
        .drop-zone {
            width: 247px;
            height: 200px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: "Quicksand", sans-serif;
            font-weight: 500;
            font-size: 20px;
            cursor: pointer;
            color: #cccccc;
            border: 1px solid var(--primary);
            border-radius: 10px;
        }

        .drop-zone--over {
            border-style: solid;
        }

        .drop-zone__input {
            display: none;
        }

        .drop-zone__thumb {
            overflow: hidden;
            background-size: contain;
            background-repeat: no-repeat;
            position: relative;
        }

        .file__thumb {
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .file__thumb::after {
            content: attr(data-label);
            width: 100%;
        }
    </style>
</head>

<body class="preload">
    <form action="" method="POST" onkeydown="return event.key != 'Enter';" enctype="multipart/form-data">
        <?php $main->menu(); ?>
        <section class="dashboard-area">
            <div class="dashboard_menu_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="menu-toggler d-md-none">
                                <span class="icon-menu"></span> Dashboard Menu
                            </button>
                            <ul class="dashboard_menu">
                                <li>
                                    <a href="dashboard.php"><span class="lnr icon-home"></span>Dashboard</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.php"><span class="lnr icon-settings"></span>Setting</a>
                                </li>
                                <li>
                                    <a href="dashboard-purchase.php"><span class="lnr icon-basket"></span>Purchase</a>
                                </li>
                                <li>
                                    <a href="dashboard-add-credit.php"><span class="lnr icon-credit-card"></span>Add
                                        Credits</a>
                                </li>
                                <li>
                                    <a href="dashboard-statement.php"><span class="lnr icon-chart"></span>Statements</a>
                                </li>
                                <li class="active">
                                    <a href="dashboard-upload.php"><span class="lnr icon-cloud-upload"></span>Upload
                                        Items</a>
                                </li>
                                <li>
                                    <a href="dashboard-manage-item.php"><span class="lnr icon-note"></span>Manage
                                        Items</a>
                                </li>
                                <li>
                                    <a href="dashboard-withdrawal.php"><span class="lnr icon-briefcase"></span>Withdrawals</a>
                                </li>
                            </ul><!-- ends: .dashboard_menu -->
                        </div><!-- ends: .col-md-12 -->
                    </div><!-- ends: .row -->
                </div><!-- ends: .container -->
            </div><!-- ends: .dashboard_menu_area -->
        </section>
        <section class="dashboard-area" id="SelectCategory">
            <div class="dashboard_contents section--padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="upload_modules pricing--info">
                                <div class="modules__title">
                                    <h4 style="font-size: 20px;"><span style="font-size: 20px;" class="primary">Product Upload</span> </h4>
                                </div><!-- ends: .module_title -->
                                <div class="modules__content">

                                    <div class="col-md-12">
                                        <div class="information_module new-cust">
                                            <ul>
                                                <li>
                                                    <div class="csutom-radio">
                                                        <h4>Select a category for your product</h4>
                                                        <br>
                                                    </div>
                                                    <div class="custom-radio">
                                                        <select name="category" id="category" onchange="checkCategoyes()">
                                                            <?php
                                                            $sql = "SELECT * FROM category";
                                                            $result = mysqli_query($conn, $sql);



                                                            if ($result->num_rows > 0) {
                                                                //output data of each row
                                                                while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                                    <option value="<?php echo $row['tag']; ?>"><?php echo $row['category name']; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        </span> Need help selecting a category?
                                                        A great way to start is by browsing through our <a href="">categories</a> to see what other authors are selling. <br>
                                                        <input type="checkbox" id="AddProductAsFree" class="" name="AddProductAsFree" value="on">
                                                        <label id="Gfont" style="color: var(--green);" for="AddProductAsFree">
                                                            <span class="circle"></span>Sell Product As Free <br>
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>


                                        </div><!-- ends: .information_module-->
                                        <!--
                                                  <span style="color: red;" id="UploadToTemplatePlusError">error</span>
                                              -->
                                    </div>


                                    <!-- ends: form -->
                                </div>
                            </div>
                            <div class="btns m-top-40 d-flex">
                                <input type="submit" id="categoryProductsBtn" name="categoryProductsBtn" class="w-50 btn btn-lg btn-primary m-right-15" value="Next">
                                <input type="submit" style="margin-left: 10px;" id="categoryProductsBtn" name="categoryProductsBtn" class="w-50 btn btn-lg btn-danger" value="Cancel">
                            </div>

                        </div>
                    </div>
                </div><!-- ends: .container -->
            </div><!-- ends: .dashboard_menu_area -->
        </section>
        <section class="dashboard-area" id="AddProduct">
            <div class="dashboard_contents section--padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h4>Item Name & Description</h4>
                                </div><!-- ends: .module_title -->
                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="product_name">Product Name</label>
                                                <input type="text" name="product_name" id="product_name" class="text_field" placeholder="Enter your product title">
                                            </div>
                                            <p>Please use unique names only, refer to our product naming guidelines for more information.</p>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-12 d-none">
                                            <style>
                                                #removeSelection>input::selection {
                                                    color: transparent;
                                                }
                                            </style>
                                            <div class="form-group" id="removeSelection">
                                                <input style="background-color: transparent; color: transparent;" type="text" name="GetCategory" id="GetCategory" class="border-none" value="<?php echo $category; ?>">
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="product_name">Live Demo</label>
                                                <input type="url" name="Live_Demo" id="product_name" class="text_field" placeholder="Live Demo">
                                            </div>
                                            <p>Add the link to your self-hosted product demo.</p>
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-12">
                                            <div class="m-bottom-20 no-margin">
                                                <p class="label">Description</p>
                                                <div class="trumbowyg-box trumbowyg-editor-visible trumbowyg-en trumbowyg">
                                                    <input type="text" name="trumbowyg-demo" style="height: 0px;" id="description" onchange="check_description()" class="trumbowyg-textarea" tabindex="-1">
                                                    <div id="trumbowyg-demo" class="trumbowyg-editor" contenteditable="true" dir="ltr" style="height: 0px;">
                                                    </div>
                                                    <div class="trumbowyg-dropdown-formatting trumbowyg-dropdown trumbowyg-fixed-top" data-dropdown="formatting" style="display: none;">
                                                        <button type="button" class="trumbowyg-p-dropdown-button"><svg>
                                                                <use xlink:href="#trumbowyg-p"></use>
                                                            </svg>Paragraph</button><button type="button" class="trumbowyg-blockquote-dropdown-button"><svg>
                                                                <use xlink:href="#trumbowyg-blockquote"></use>
                                                            </svg>Quote</button><button type="button" class="trumbowyg-h1-dropdown-button"><svg>
                                                                <use xlink:href="#trumbowyg-h1"></use>
                                                            </svg>Header 1</button><button type="button" class="trumbowyg-h2-dropdown-button"><svg>
                                                                <use xlink:href="#trumbowyg-h2"></use>
                                                            </svg>Header 2</button><button type="button" class="trumbowyg-h3-dropdown-button"><svg>
                                                                <use xlink:href="#trumbowyg-h3"></use>
                                                            </svg>Header 3</button><button type="button" class="trumbowyg-h4-dropdown-button"><svg>
                                                                <use xlink:href="#trumbowyg-h4"></use>
                                                            </svg>Header 4</button>
                                                    </div>
                                                    <div class="trumbowyg-dropdown-link trumbowyg-dropdown trumbowyg-fixed-top" data-dropdown="link" style="display: none;"><button type="button" class="trumbowyg-createLink-dropdown-button" title=" (Ctrl + K)"><svg>
                                                                <use xlink:href="#trumbowyg-create-link"></use>
                                                            </svg>Insert link</button><button type="button" class="trumbowyg-unlink-dropdown-button"><svg>
                                                                <use xlink:href="#trumbowyg-unlink"></use>
                                                            </svg>Remove link</button></div>
                                                    <div class="trumbowyg-overlay" style="top: 37px; height: 201px;">
                                                    </div>
                                                </div>
                                                <p id="unicp">The text should contain a detailed description of your product and information about the niche where it can be applied. Use relevant keywords to describe your product. HTML and plain text are allowed, special symbols and emojis are not allowed. The recommended length - 512 characters, max length is unlimited.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- ends: .modules__content -->
                            </div><!-- ends: .upload_modules -->
                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h4>Files</h4>
                                </div><!-- ends: .module_title -->
                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-12 d-flex flex-wrap w-100 mb-50">
                                            <style>
                                                .drop-zone {
                                                    margin-left: 15px;
                                                    margin-top: 10px;
                                                }
                                            </style>
                                            <div class="col-md-12">
                                                <label for="">Your Product Files Upload</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="drop-zone w-100 mb-50" style="max-width: unset;">
                                                    <div class="d-flex justify-content-center flex-column w-100" id="start">
                                                        <span class="bi bi-cloud-arrow-up" id="card-uploadFile"></span>
                                                        <span class="drop-zone__prompt">Click to choose your project ZIP-file, or drop it here</span>
                                                    </div>
                                                    <input type="file" name="MainFile" id="MainFile" class="drop-zone__input">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Main Image</label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for=""></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for=""></label>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="drop-zone w-100 mb-50" style="max-width: unset;">
                                                    <div class="d-flex flex-column">
                                                        <span class="bi bi-card-image" id="card-image"></span>
                                                        <span class="drop-zone__prompt">Click to choose your project ZIP-file, or drop it here</span>
                                                    </div>
                                                    <input type="file" name="MainImage" id="MainImage" class="drop-zone__input">
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <label for=""></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Slider Images</label>
                                            </div>
                                            <div class="d-flex flex-wrap justify-content-center">
                                                <div class="drop-zone">
                                                    <div class="d-flex flex-column">
                                                        <span class="bi bi-card-image" id="card-image"></span>
                                                        <span class="drop-zone__prompt">Click to choose your project ZIP-file, or drop it here</span>
                                                    </div>
                                                    <input type="file" name="myFile" id="Slider1" class="drop-zone__input">
                                                </div>
                                                <div class="drop-zone">
                                                    <div class="d-flex flex-column">
                                                        <span class="bi bi-card-image" id="card-image"></span>
                                                        <span class="drop-zone__prompt">Click to choose your project ZIP-file, or drop it here</span>
                                                    </div>
                                                    <input type="file" name="myFile" id="Slider2" class="drop-zone__input">
                                                </div>



                                                <div class="drop-zone">
                                                    <div class="d-flex flex-column">
                                                        <span class="bi bi-card-image" id="card-image"></span>
                                                        <span class="drop-zone__prompt">Click to choose your project ZIP-file, or drop it here</span>
                                                    </div>
                                                    <input type="file" name="myFile" id="Slider3" class="drop-zone__input">
                                                </div>


                                                <div class="drop-zone">
                                                    <div class="d-flex flex-column">
                                                        <span class="bi bi-card-image" id="card-image"></span>
                                                        <span class="drop-zone__prompt">Click to choose your project ZIP-file, or drop it here</span>
                                                    </div>
                                                    <input type="file" name="myFile" id="Slider4" class="drop-zone__input">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div><!-- ends: .modules__content -->
                            </div>

                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h4>Attributes</h4>
                                </div><!-- ends: .module_title -->
                                <div class="modules__content">
                                    <div class="row">
                                        <!--
                                                                              <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="select-multiple">
                                                    <label>Files Included</label>
                                                    <select class="select2_tagged form-control" name="WordPressCompatibility">
                                                        <option value="AI">AI</option>
                                                        <option value="BMP">BMP</option>
                                                        <option value="CDR">CDR</option>
                                                        <option value="CSS">CSS</option>
                                                        <option value="DOC">DOC</option>
                                                        <option value="DOCX">DOCX</option>
                                                        <option value="EPS">EPS</option>
                                                        <option value="FIG">FIG</option>
                                                        <option value="GIF">GIF</option>
                                                        <option value="HTML">HTML</option>
                                                        <option value="ICO">ICO</option>
                                                        <option value="INDD">INDD</option>
                                                        <option value="JPEG">JPEG</option>
                                                        <option value="JPG">JPG</option>
                                                        <option value="OTF">OTF</option>
                                                        <option value="PAGES">PAGES</option>
                                                        <option value="PDF">PDF</option>
                                                        <option value="PNG">PNG</option>
                                                        <option value="PSD">PSD</option>
                                                        <option value="RAW">RAW</option>
                                                        <option value="SVG">SVG</option>
                                                        <option value="TIFF">TIFF</option>
                                                        <option value="TTF">TTF</option>
                                                        <option value="TXT">TXT</option>
                                                        <option value="XD">XD</option>
                                                    </select>
                                                </div>
                                                <p>Check as many as are applicable.</p>
                                            </div>
                                        </div>
                                    -->
                                        <?php if (!empty($category) && !empty($AllowedBootstrapVersion) && in_array($category, $AllowedBootstrapVersion)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Bootstrap Version</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="BootstrapVersion">
                                                                    <option value="">None</option>
                                                                    <option value="2.1.0">2.1.0</option>
                                                                    <option value="2.1.1">2.1.1</option>
                                                                    <option value="2.2.0">2.2.0</option>
                                                                    <option value="2.2.2">2.2.2</option>
                                                                    <option value="2.3.0">2.3.0</option>
                                                                    <option value="2.3.1">2.3.1</option>
                                                                    <option value="3.0">3.0</option>
                                                                    <option value="3.0.1">3.0.1</option>
                                                                    <option value="3.0.2">3.0.2</option>
                                                                    <option value="3.0.3">3.0.3</option>
                                                                    <option value="3.1.0">3.1.0</option>
                                                                    <option value="3.2.0">3.2.0</option>
                                                                    <option value="3.3.x">3.3.x</option>
                                                                    <option value="4.0.x">4.0.x</option>
                                                                    <option value="4.1.x">4.1.x</option>
                                                                    <option value="4.2.x">4.2.x</option>
                                                                    <option value="4.3.x">4.3.x</option>
                                                                    <option value="4.4.x">4.4.x</option>
                                                                    <option value="4.5.x">4.5.x</option>
                                                                    <option value="5.alphaX">5.alphaX</option>
                                                                    <option value="5.x">5.x</option>
                                                                </select>
                                                                Choose your product's Bootstrap framework version. <br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedGraphicsType) && in_array($category, $AllowedGraphicsType)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Graphics Type</label>
                                                        <select class="select2_tagged form-control" name="GraphicsType[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="Raster">Raster</option>
                                                            <option value="Vector">Vector</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedIconStyles) && in_array($category, $AllowedIconStyles)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Icon Styles</label>
                                                        <select class="select2_tagged form-control" name="IconStyles[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="3D">3D</option>
                                                            <option value="Android">Android</option>
                                                            <option value="Badge">Badge</option>
                                                            <option value="Circle">Circle</option>
                                                            <option value="Clipart">Clipart</option>
                                                            <option value="Colored">Colored</option>
                                                            <option value="Doodle">Doodle</option>
                                                            <option value="Dotted">Dotted</option>
                                                            <option value="Emoji">Emoji</option>
                                                            <option value="Flat">Flat</option>
                                                            <option value="Glyph">Glyph</option>
                                                            <option value="Gradient">Gradient</option>
                                                            <option value="Hand-drawn">Hand-drawn</option>
                                                            <option value="Material">Material</option>
                                                            <option value="Office">Office</option>
                                                            <option value="Outline">Outline</option>
                                                            <option value="Pastel">Pastel</option>
                                                            <option value="Photorealistic">Photorealistic</option>
                                                            <option value="Windows">Windows</option>
                                                            <option value="iOS">iOS</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedCompatibility) && in_array($category, $AllowedCompatibility)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Compatibility</label>
                                                        <select class="select2_tagged form-control" name="Compatibility[]" multiple="multiple">
                                                            <option value="iWork Pages">iWork Pages</option>
                                                            <option value="Sketch">Sketch</option>
                                                            <option value="Microsoft Word">Microsoft Word</option>
                                                            <option value="Figma">Figma</option>
                                                            <option value="Corel Draw">Corel Draw</option>
                                                            <option value="Code Editor">Code Editor</option>
                                                            <option value="Adobe XD">Adobe XD</option>
                                                            <option value="Adobe Photoshop">Adobe Photoshop</option>
                                                            <option value="Adobe InDesign">Adobe InDesign</option>
                                                            <option value="Adobe Illustrator">Adobe Illustrator</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedSoftwareVersion) && in_array($category, $AllowedSoftwareVersion)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Software Version</label>
                                                        <select class="select2_tagged form-control" name="SoftwareVersion[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="After Effects CC">After Effects CC</option>
                                                            <option value="Premiere Pro CC">Premiere Pro CC</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedTempoBPM) && in_array($category, $AllowedTempoBPM)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Tempo (BPM)</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="TempoBPM">
                                                                    <option value="Fast (140 - 160 BPM)">Fast (140 - 160 BPM)</option>
                                                                    <option value="Medium (90 - 110 BPM)">Medium (90 - 110 BPM)</option>
                                                                    <option value="Slow (60 - 90 BPM)">Slow (60 - 90 BPM)</option>
                                                                    <option value="Upbeat (110 - 140 BPM)">Upbeat (110 - 140 BPM)</option>
                                                                    <option value="Very fast (160+ BPM)">Very fast (160+ BPM)</option>
                                                                    <option value="Very slow (0 - 60 BPM)">Very slow (0 - 60 BPM)</option>
                                                                </select>
                                                                Choose your product's Bootstrap framework version. <br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedLength) && in_array($category, $AllowedLength)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Length">Length</label>
                                                    <input type="text" name="Length" id="Length" class="text_field" placeholder="1:30">
                                                </div>
                                                <p>Length in minutes and seconds: 2:40 for 2 minutes and 40 seconds, 0:20 for 20 seconds.</p>
                                            </div><!-- ends: .col-md-6 -->
                                        <?Php } ?>
                                        <?php if (!empty($category) && !empty($AllowedAfterEffectsVersion) && in_array($category, $AllowedAfterEffectsVersion)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">After Effects Version</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="AfterEffectsVersion">
                                                                    <option value=""></option>
                                                                    <option value="After Effects CC">After Effects CC</option>
                                                                    <option value="After Effects CS3">After Effects CS3</option>
                                                                    <option value="After Effects CS4">After Effects CS4</option>
                                                                    <option value="After Effects CS5">After Effects CS5</option>
                                                                    <option value="After Effects CS5.5">After Effects CS5.5</option>
                                                                    <option value="After Effects CS6">After Effects CS6</option>
                                                                </select>
                                                                Check as many as are applicable. <br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?Php } ?>
                                        <?php if (!empty($category) && !empty($AllowedFilesIncluded) && in_array($category, $AllowedFilesIncluded)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Files Included</label>
                                                        <select class="select2_tagged form-control" name="FilesIncluded[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="After Effects Files">After Effects Files</option>
                                                            <option value="Disign Files">Disign Files</option>
                                                            <option value="Motion Graphics Template Files">Motion Graphics Template Files</option>
                                                            <option value="Music Files">Music Files</option>
                                                            <option value="Premiere Pro Project Files">Premiere Pro Project Files</option>
                                                            <option value="Script Files">Script Files</option>
                                                            <option value="Sound Effect Files">Sound Effect Files</option>
                                                            <option value="Video Files">Video Files</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?Php if (!empty($category) && !empty($AllowedVocals) && in_array($category, $AllowedVocals)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Vocals</label>
                                                        <select class="select2_tagged form-control" name="Vocals[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="Background Vocals">Background Vocals</option>
                                                            <option value="Instrumental Included">Instrumental Included</option>
                                                            <option value="Lead vocals">Lead vocals</option>
                                                            <option value="Vocal samples">Vocal samples</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedEmailSystemsCompatibility) && in_array($category, $AllowedEmailSystemsCompatibility)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Email Systems Compatibility</label>
                                                        <select class="select2_tagged form-control" name="EmailSystemsCompatibility[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="Yandex Mail">Yandex Mail</option>
                                                            <option value="Yahoo Mail">Yahoo Mail</option>
                                                            <option value="Outlook 2007">Outlook 2007</option>
                                                            <option value="Mozilla Thunderbird">Mozilla Thunderbird</option>
                                                            <option value="Mail.ru">Mail.ru</option>
                                                            <option value="Hotmail">Hotmail</option>
                                                            <option value="Gmail Apple">Gmail Apple</option>
                                                            <option value="Gmail App for Android (partly supported)">Gmail App for Android (partly supported)</option>
                                                            <option value="Apple Mail">Apple Mail</option>
                                                            <option value="AOL Mail">AOL Mail</option>
                                                        </select>
                                                    </div>
                                                    <p>Choose email systems integrated into your product.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?Php } ?>
                                        <?php if (!empty($category) && !empty($AllowedFeatures) && in_array($category, $AllowedFeatures)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Features</label>
                                                        <select class="select2_tagged form-control" name="Features[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="3D Print">3D Print</option>
                                                            <option value="3D Scan">3D Scan</option>
                                                            <option value="Animated">Animated</option>
                                                            <option value="High poly">High poly</option>
                                                            <option value="Low poly">Low poly</option>
                                                            <option value="PBR">PBR</option>
                                                            <option value="Rigged">Rigged</option>
                                                        </select>
                                                    </div>
                                                    <p>Choose the file types included in your product.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedPolygonCount) && in_array($category, $AllowedPolygonCount)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="PolygonCount">Polygon Count</label>
                                                    <input type="text" name="PolygonCount" id="PolygonCount" class="text_field" placeholder="Enter Polygon Count">
                                                </div>
                                                <p>Enter polygon count of your 3D model.</p>
                                            </div><!-- ends: .col-md-6 -->
                                        <?Php } ?>
                                        <?php if (!empty($category) && !empty($AllowedResolution) && in_array($category, $AllowedResolution)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Resolution</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="Resolution">
                                                                    <option value=""></option>
                                                                    <option value="4K">4K</option>
                                                                    <option value="5K+">5K+</option>
                                                                    <option value="HD (1080)">HD (1080)</option>
                                                                    <option value="HD (720)">HD (720)</option>
                                                                    <option value="SD">SD</option>
                                                                </select>
                                                                <br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedElementorVersion) && in_array($category, $AllowedElementorVersion)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Elementor Version</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="ElementorVersion">
                                                                    <option value="">Click and choose</option>
                                                                    <option value="Free">Free</option>
                                                                    <option value="Pro">Pro</option>
                                                                </select>
                                                                Check one of the options. <br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedWordpressEngine) && in_array($category, $AllowedWordpressEngine)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">WordPress Engine</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="WordPressEngine">
                                                                    <option value=""></option>
                                                                    <option value="5.9.x">5.9.x</option>
                                                                    <option value="5.6.x">5.6.x</option>
                                                                    <option value="5.5.x">5.5.x</option>
                                                                    <option value="5.4.x">5.4.x</option>
                                                                    <option value="5.3.x">5.3.x</option>
                                                                    <option value="5.2.x">5.2.x</option>
                                                                    <option value="5.1.x">5.1.x</option>
                                                                    <option value="5.0">5.0</option>
                                                                    <option value="4.9.x">4.9.x</option>
                                                                    <option value="4.8.x">4.8.x</option>
                                                                    <option value="4.7.x">4.7.x</option>
                                                                    <option value="4.6.x">4.6.x</option>
                                                                    <option value="4.5.x">4.5.x</option>
                                                                    <option value="4.4.x">4.4.x</option>
                                                                    <option value="4.3.x">4.3.x</option>
                                                                    <option value="4.2.x">4.2.x</option>
                                                                    <option value="4.1.x">4.1.x</option>
                                                                    <option value="4.0.x">4.0.x</option>
                                                                    <option value="3.9.x">3.9.x</option>
                                                                    <option value="3.8.x">3.8.x</option>
                                                                    <option value="3.7.x">3.7.x</option>
                                                                    <option value="3.6.x">3.6.x</option>
                                                                    <option value="3.5.x">3.5.x</option>
                                                                    <option value="3.4.x">3.4.x</option>
                                                                    <option value="3.3.2">3.3.2</option>
                                                                    <option value="3.3.1">3.3.1</option>
                                                                    <option value="3.3">3.3</option>
                                                                    <option value="3.2.1">3.2.1</option>
                                                                    <option value="3.1.3">3.1.3</option>
                                                                    <option value="3.1">3.1</option>
                                                                    <option value="3.0.x">3.0.x</option>
                                                                    <option value="3.0">3.0</option>
                                                                    <option value="2.9">2.9</option>
                                                                    <option value="2.8">2.8</option>
                                                                    <option value="2.7">2.7</option>
                                                                    <option value="2.6">2.6</option>
                                                                    <option value="2.3.x">2.3.x</option>
                                                                    <option value="2.1.x">2.1.x</option>
                                                                </select>
                                                                Choose your product's WordPress engine version.<br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedWordPressCompatibility) && in_array($category, $AllowedWordPressCompatibility)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>WordPress Compatibility</label>
                                                        <select class="select2_tagged form-control" name="WordPressCompatibility[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="6.0.x">6.0.x</option>
                                                            <option value="5.9.x">5.9.x</option>
                                                            <option value="5.8.x">5.8.x</option>
                                                            <option value="5.7.x">5.7.x</option>
                                                            <option value="5.6.x">5.6.x</option>
                                                            <option value="5.5.x">5.5.x</option>
                                                            <option value="5.4.x">5.4.x</option>
                                                            <option value="5.3.x">5.3.x</option>
                                                            <option value="5.2.x">5.2.x</option>
                                                            <option value="5.1.x">5.1.x</option>
                                                            <option value="5.0.x">5.0.x</option>
                                                            <option value="5.0-5.6.x">5.0-5.6.x</option>
                                                            <option value="5.4.x">5.4.x</option>
                                                            <option value="4.9.x">4.9.x</option>
                                                            <option value="4.8.x">4.8.x</option>
                                                            <option value="4.7.x">4.7.x</option>
                                                            <option value="4.6.x">4.6.x</option>
                                                            <option value="4.5.x">4.5.x</option>
                                                            <option value="4.4.x">4.4.x</option>
                                                            <option value="4.3.x">4.3.x</option>
                                                            <option value="4.2.x-4.9.x">4.2.x-4.9.x</option>
                                                            <option value="4.2.x">4.2.x</option>
                                                            <option value="4.1.x">4.1.x</option>
                                                            <option value="4.0.x">4.0.x</option>
                                                            <option value="3.9.x">3.9.x</option>
                                                            <option value="3.8.x">3.8.x</option>
                                                            <option value="3.7.x">3.7.x</option>
                                                            <option value="3.6.x-4.2.x">3.6.x-4.2.x</option>
                                                            <option value="3.6.x">3.6.x</option>
                                                            <option value="3.5.x">3.5.x</option>
                                                            <option value="3.4.x">3.4.x</option>
                                                            <option value="3.2.x - 3.4.x">3.2.x - 3.4.x</option>
                                                            <option value="3.0.x - 3.4.x">3.0.x - 3.4.x</option>
                                                            <option value="3.0.x">3.0.x</option>
                                                            <option value="2.1.x - 2.9.x">2.1.x - 2.9.x</option>
                                                            <option value="2.0.x">2.0.x</option>
                                                        </select>
                                                    </div>
                                                    <p>Choose WordPress engine version(s) compatible with your product. Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedWordPressBuilder) && in_array($category, $AllowedWordPressBuilder)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>WordPress Builder</label>
                                                        <select class="select2_tagged form-control" name="WordPressBuilder[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="Beaver Builder">Beaver Builder</option>
                                                            <option value="Breeze Page Builder">Breeze Page Builder</option>
                                                            <option value="Cherry Framework 3">Cherry Framework 3</option>
                                                            <option value="Cherry Framework 4">Cherry Framework 4</option>
                                                            <option value="Cherry Framework 5">Cherry Framework 5</option>
                                                            <option value="Divi Builder">Divi Builder</option>
                                                            <option value="Elementor Website Builder">Elementor Website Builder</option>
                                                            <option value="Gutenberg Editor">Gutenberg Editor</option>
                                                            <option value="King Composer">KingComposer</option>
                                                            <option value="MotoPress Editor">MotoPress Editor</option>
                                                            <option value="Visual Composer">Visual Composer</option>
                                                            <option value="WPBakery Page Builder">WPBakery Page Builder</option>
                                                            <option value="WordPress Customizer API">WordPress Customizer API</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedWooCommerceCompatibility) && in_array($category, $AllowedWooCommerceCompatibility)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>WooCommerce Compatibility</label>
                                                        <select class="select2_tagged form-control" name="WooCommerceCompatibility[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="6.5.x">6.5.x</option>
                                                            <option value="6.4.x">6.4.x</option>
                                                            <option value="6.3.x">6.3.x</option>
                                                            <option value="6.2.x">6.2.x</option>
                                                            <option value="6.1.x">6.1.x</option>
                                                            <option value="6.0.x">6.0.x</option>
                                                            <option value="5.9.x">5.9.x</option>
                                                            <option value="5.8.x">5.8.x</option>
                                                            <option value="5.7.x">5.7.x</option>
                                                            <option value="5.6.x">5.6.x</option>
                                                            <option value="5.5.x">5.5.x</option>
                                                            <option value="5.4.x">5.4.x</option>
                                                            <option value="5.3.x">5.3.x</option>
                                                            <option value="5.2.x">5.2.x</option>
                                                            <option value="5.1.x">5.1.x</option>
                                                            <option value="5.0.x">5.0.x</option>
                                                            <option value="4.9.x">4.9.x</option>
                                                            <option value="4.8.x">4.8.x</option>
                                                            <option value="4.7.x">4.7.x</option>
                                                            <option value="4.6.x">4.6.x</option>
                                                            <option value="4.5.x">4.5.x</option>
                                                            <option value="4.4.x">4.4.x</option>
                                                            <option value="4.3.x">4.3.x</option>
                                                            <option value="4.2.x">4.2.x</option>
                                                            <option value="4.1.x">4.1.x</option>
                                                            <option value="4.0.x">4.0.x</option>
                                                            <option value="3.9.x">3.9.x</option>
                                                            <option value="3.8.x">3.8.x</option>
                                                            <option value="3.7.x">3.7.x</option>
                                                            <option value="3.6.x-4.2.x">3.6.x-4.2.x</option>
                                                            <option value="3.6.x">3.6.x</option>
                                                            <option value="3.5.x">3.5.x</option>
                                                            <option value="3.4.x">3.4.x</option>
                                                            <option value="3.3.x">3.3.x</option>
                                                            <option value="3.2.x">3.2.x</option>
                                                            <option value="3.1.x">3.1.x</option>
                                                            <option value="3.0.x">3.0.x</option>
                                                            <option value="2.6.x">2.6.x</option>
                                                            <option value="2.5.x">2.5.x</option>
                                                            <option value="2.4.x">2.4.x</option>
                                                            <option value="2.3.x">2.3.x</option>
                                                            <option value="2.2.x">2.2.x</option>
                                                            <option value="2.1.x-2.4.x">2.1.x-2.4.x</option>
                                                            <option value="2.0.x">2.0.x</option>
                                                            <option value="2.0.19">2.0.19</option>
                                                            <option value="2.0.18">2.0.18</option>
                                                            <option value="2.0.14">2.0.14</option>
                                                        </select>
                                                    </div>
                                                    <p>Choose WooCommerce platform version(s) compatible with your product. Check as many as are applicable.
                                                    </p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedCompatibleWith) && in_array($category, $AllowedCompatibleWith)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Compatible with</label>
                                                        <select class="select2_tagged form-control" name="CompatibleWith[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="Booked">Booked</option>
                                                            <option value="Ecwid">Ecwid</option>
                                                            <option value="LearnPress">LearnPress</option>
                                                            <option value="MailChimp">MailChimp</option>
                                                            <option value="Polylang">Polylang</option>
                                                            <option value="Revolution Slider">Revolution Slider</option>
                                                            <option value="WPML">WPML</option>
                                                            <option value="WooCommerce">WooCommerce</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedStyles) && in_array($category, $AllowedStyles)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Styles</label>
                                                        <select class="select2_tagged form-control" name="Styles[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="3D effect">3D effect</option>
                                                            <option value="Artworks">Artworks</option>
                                                            <option value="Cartoon">Cartoon</option>
                                                            <option value="Clean">Clean</option>
                                                            <option value="Collage">Collage</option>
                                                            <option value="Corporate">Corporate</option>
                                                            <option value="Dark">Dark</option>
                                                            <option value="Flat">Flat</option>
                                                            <option value="Futurist">Futurist</option>
                                                            <option value="Geometric">Geometric</option>
                                                            <option value="Grunge">Grunge</option>
                                                            <option value="Material Design">Material Design</option>
                                                            <option value="Minimalist">Minimalist</option>
                                                            <option value="Mobile">Mobile</option>
                                                            <option value="Neutral">Neutral</option>
                                                            <option value="Paper Made">Paper Made</option>
                                                            <option value="Retro">Retro</option>
                                                            <option value="Urban/Street">Urban/Street</option>
                                                            <option value="Vector">Vector</option>
                                                            <option value="Web2.0">Web2.0</option>
                                                        </select>
                                                    </div>
                                                    <p>Choose additional styles that characterize your product. Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedMotoCMSVersion) && in_array($category, $AllowedMotoCMSVersion)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Moto CMS Version</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="MotoCMSVersion">
                                                                    <option value="">None</option>
                                                                    <option value="3.1.1">3.1.1</option>
                                                                    <option value="3.1.2">3.1.2</option>
                                                                    <option value="3.1.3">3.1.3</option>
                                                                    <option value="3.2.5">3.2.5</option>
                                                                    <option value="3.3.18">3.3.18</option>
                                                                </select>
                                                                Choose your product's MotoCMS engine version.<br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?Php } ?>
                                        <?php if (!empty($category) && !empty($AllowedMotoCMSWidgets) && in_array($category, $AllowedMotoCMSWidgets)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Moto CMS Widgets</label>
                                                        <select class="select2_tagged form-control" name="MotoCMSWidgets[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="Google Maps">Google Maps</option>
                                                            <option value="Media library">Media library</option>
                                                            <option value="Menu">Menu</option>
                                                            <option value="Presets Builder">Presets Builder</option>
                                                        </select>
                                                    </div>
                                                    <p>
                                                    <p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?Php } ?>
                                        <?php if (!empty($category) && !empty($AllowedMotoTrialType) && in_array($category, $AllowedMotoTrialType)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Moto Trial Type</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="MotoTrialType">
                                                                    <option value="">None</option>
                                                                    <option value="Trial-Moto3">Trial-Moto3</option>
                                                                    <option value="Trial-MotoFlash">Trial-MotoFlash</option>
                                                                    <option value="Trial-MotoHTML">Trial-MotoHTML</option>
                                                                </select>
                                                                <br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedThemeArchitectureVersion) && in_array($category, $AllowedThemeArchitectureVersion)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Theme Architecture Version</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="ThemeArchitectureVersion">
                                                                    <option value="Online Store 2.0">Online Store 2.0</option>
                                                                    <option value="Vintage">Vintage</option>
                                                                </select>
                                                                Select one of the options.<br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?Php } ?>
                                        <?Php if (!empty($category) && !empty($AllowedMagentoEngine) && in_array($category, $AllowedMagentoEngine)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Magento Engine</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="MagentoEngine">
                                                                    <option value=""></option>
                                                                    <option value="2.4.4">2.4.4</option>
                                                                    <option value="2.4.3">2.4.3</option>
                                                                    <option value="2.4.2">2.4.2</option>
                                                                    <option value="2.4.1">2.4.1</option>
                                                                    <option value="2.4.0">2.4.0</option>
                                                                    <option value="2.3.5">2.3.5</option>
                                                                    <option value="2.3.4">2.3.4</option>
                                                                    <option value="2.3.3">2.3.3</option>
                                                                    <option value="2.3.2">2.3.2</option>
                                                                    <option value="2.3.1">2.3.1</option>
                                                                    <option value="2.3.0">2.3.0</option>
                                                                    <option value="2.2.6">2.2.6</option>
                                                                    <option value="2.2.5">2.2.5</option>
                                                                    <option value="2.2.4">2.2.4</option>
                                                                    <option value="2.2.3">2.2.3</option>
                                                                    <option value="2.2.2">2.2.2</option>
                                                                    <option value="2.2.1">2.2.1</option>
                                                                    <option value="2.2.0">2.2.0</option>
                                                                    <option value="2.1.8">2.1.8</option>
                                                                    <option value="2.1.7">2.1.7</option>
                                                                    <option value="2.1.6">2.1.6</option>
                                                                    <option value="2.1.5">2.1.5</option>
                                                                    <option value="2.1.4">2.1.4</option>
                                                                    <option value="2.1.3">2.1.3</option>
                                                                    <option value="2.1.2">2.1.2</option>
                                                                    <option value="2.1.1">2.1.1</option>
                                                                    <option value="2.1.0">2.1.0</option>
                                                                    <option value="2.0.7">2.0.7</option>
                                                                    <option value="2.0.6">2.0.6</option>
                                                                    <option value="2.0.5">2.0.5</option>
                                                                    <option value="2.0.4">2.0.4</option>
                                                                    <option value="2.0.2">2.0.2</option>
                                                                    <option value="2.0.0">2.0.0</option>
                                                                    <option value="1.9.x">1.9.x</option>
                                                                    <option value="1.9.2.4">1.9.2.4</option>
                                                                    <option value="1.9.2.3">1.9.2.3</option>
                                                                    <option value="1.9.2.2">1.9.2.2</option>
                                                                    <option value="1.8.1.x">1.8.1.x</option>
                                                                    <option value="1.8.0.x">1.8.0.x</option>
                                                                    <option value="1.7.0.x">1.7.0.x</option>
                                                                    <option value="1.6.2.x">1.6.2.x</option>
                                                                    <option value="1.6.1.x">1.6.1.x</option>
                                                                    <option value="1.6.0.x">1.6.0.x</option>
                                                                    <option value="1.5.1.x">1.5.1.x</option>
                                                                    <option value="1.5.0.x">1.5.0.x</option>
                                                                    <option value="1.4.2.x">1.4.2.x</option>
                                                                    <option value="1.4.1.x">1.4.1.x</option>
                                                                    <option value="1.4.0.1">1.4.0.1</option>
                                                                    <option value="1.4.0">1.4.0</option>
                                                                    <option value="1.3.x">1.3.x</option>
                                                                    <option value="1.3.2.x">1.3.2.x</option>
                                                                    <option value="1.3.0">1.3.0</option>
                                                                    <option value="1.2.x">1.2.x</option>
                                                                    <option value="1.1.8">1.1.8</option>
                                                                    <option value="1.1.7">1.1.7</option>
                                                                    <option value="1.1.6">1.1.6</option>
                                                                </select>
                                                                Choose your product's Magento CMS version.<br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?Php } ?>
                                        <?php if (!empty($category) && !empty($AllowedMagentoCompatibility) && in_array($category, $AllowedMagentoCompatibility)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Magento Compatibility</label>
                                                        <select class="select2_tagged form-control" name="MagentoCompatibility[]" multiple="multiple">
                                                            <option value="2.4.4">2.4.4</option>
                                                            <option value="2.4.3">2.4.3</option>
                                                            <option value="2.4.2">2.4.2</option>
                                                            <option value="2.4.1">2.4.1</option>
                                                            <option value="2.4.0">2.4.0</option>
                                                            <option value="2.3.5">2.3.5</option>
                                                            <option value="2.3.4">2.3.4</option>
                                                            <option value="2.3.3">2.3.3</option>
                                                            <option value="2.3.2">2.3.2</option>
                                                            <option value="2.3.1">2.3.1</option>
                                                            <option value="2.3.0">2.3.0</option>
                                                            <option value="2.2.7">2.2.7</option>
                                                            <option value="2.2.6">2.2.6</option>
                                                            <option value="2.2.5">2.2.5</option>
                                                            <option value="2.2.4">2.2.4</option>
                                                            <option value="2.2.3">2.2.3</option>
                                                            <option value="2.2.2">2.2.2</option>
                                                            <option value="2.2.1">2.2.1</option>
                                                            <option value="2.2.0">2.2.0</option>
                                                            <option value="2.1.x">2.1.x</option>
                                                            <option value="2.1.8">2.1.8</option>
                                                            <option value="2.1.7">2.1.7</option>
                                                            <option value="2.1.6">2.1.6</option>
                                                            <option value="2.1.5">2.1.5</option>
                                                            <option value="2.1.4">2.1.4</option>
                                                            <option value="2.1.3">2.1.3</option>
                                                            <option value="2.1.2">2.1.2</option>
                                                            <option value="2.1.0">2.1.0</option>
                                                            <option value="2.0.x">2.0.x</option>
                                                            <option value="2.0.7">2.0.7</option>
                                                            <option value="2.0.6">2.0.6</option>
                                                            <option value="2.0.5">2.0.5</option>
                                                            <option value="1.9.x">1.9.x</option>
                                                            <option value="1.9.2.x">1.9.2.x</option>
                                                            <option value="1.8.x-1.9.x">1.8.x-1.9.x</option>
                                                            <option value="1.8.x">1.8.x</option>
                                                            <option value="1.8.1.x">1.8.1.x</option>
                                                            <option value="1.7.x">1.7.x</option>
                                                            <option value="1.6.x">1.6.x</option>
                                                            <option value="1.5.x">1.5.x</option>
                                                            <option value="1.4.2">1.4.2</option>
                                                            <option value="1.4.1.x">1.4.1.x</option>
                                                            <option value="1.4.0.x">1.4.0.x</option>
                                                            <option value="1.3.x">1.3.x</option>
                                                            <option value="1.2.x">1.2.x</option>
                                                            <option value="1.1.x">1.1.x</option>
                                                        </select>
                                                    </div>
                                                    <p>Choose Magento platform version(s) compatible with your product. Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedMagentoExtensions) && in_array($category, $AllowedMagentoExtensions)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Magento Extensions</label>
                                                        <select class="select2_tagged form-control" name="MagentoExtensions[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="AMP">AMP</option>
                                                            <option value="Ajax Cart">Ajax Cart</option>
                                                            <option value="Ajax Catalog">Ajax Catalog</option>
                                                            <option value="Ajax Compare">Ajax Compare</option>
                                                            <option value="Ajax Search">Ajax Search</option>
                                                            <option value="Ajax Wishlist">Ajax Wishlist</option>
                                                            <option value="Blog">Blog</option>
                                                            <option value="Catalog Images Grid">Catalog Images Grid</option>
                                                            <option value="Cloud Zoom">Cloud Zoom</option>
                                                            <option value="Custom Menu">Custom Menu</option>
                                                            <option value="Custom Tab">Custom Tab</option>
                                                            <option value="Facebook page plugin">Facebook page plugin</option>
                                                            <option value="Featured Products">Featured Products</option>
                                                            <option value="Film Slider">Film Slider</option>
                                                            <option value="Google Map">Google Map</option>
                                                            <option value="Image Zoom">Image Zoom</option>
                                                            <option value="Layout Switcher">Layout Switcher</option>
                                                            <option value="MegaMenu">MegaMenu</option>
                                                            <option value="Newsletter popup">Newsletter popup</option>
                                                            <option value="Parallax and Video Background">Parallax and Video Background</option>
                                                            <option value="Promo Banner">Promo Banner</option>
                                                            <option value="Quick View">Quick View</option>
                                                            <option value="Sale Products">Sale Products</option>
                                                            <option value="Sample Data Installer">Sample Data Installer</option>
                                                            <option value="Shop by Brand">Shop by Brand</option>
                                                            <option value="Site Maintenance">Site Maintenance</option>
                                                            <option value="Smart Product Labels">Smart Product Labels</option>
                                                            <option value="Social Icons">Social Icons</option>
                                                            <option value="Social Login">Social Login</option>
                                                            <option value="Social Sharing">Social Sharing</option>
                                                            <option value="Special Price Countdown">Special Price Countdown</option>
                                                            <option value="Theme Options">Theme Options</option>
                                                            <option value="Twitter plugin">Twitter plugin</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?Php if (!empty($category) && !empty($AllowedPrestashopEngine) && in_array($category, $AllowedPrestashopEngine)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Prestashop Engine</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="PrestashopEngine">
                                                                    <option value="1.7.8.6">1.7.8.6</option>
                                                                    <option value="1.7.8.5">1.7.8.5</option>
                                                                    <option value="1.7.8.4">1.7.8.4</option>
                                                                    <option value="1.7.8.3">1.7.8.3</option>
                                                                    <option value="1.7.8.2">1.7.8.2</option>
                                                                    <option value="1.7.8.1">1.7.8.1</option>
                                                                    <option value="1.7.8.0">1.7.8.0</option>
                                                                    <option value="1.7.7.8">1.7.7.8</option>
                                                                    <option value="1.7.7.7">1.7.7.7</option>
                                                                    <option value="1.7.7.6">1.7.7.6</option>
                                                                    <option value="1.7.7.5">1.7.7.5</option>
                                                                    <option value="1.7.7.4">1.7.7.4</option>
                                                                    <option value="1.7.7.3">1.7.7.3</option>
                                                                    <option value="1.7.7.2">1.7.7.2</option>
                                                                    <option value="1.7.7.1">1.7.7.1</option>
                                                                    <option value="1.7.6.9">1.7.6.9</option>
                                                                    <option value="1.7.6.8">1.7.6.8</option>
                                                                    <option value="1.7.6.7">1.7.6.7</option>
                                                                    <option value="1.7.6.6">1.7.6.6</option>
                                                                    <option value="1.7.6.5">1.7.6.5</option>
                                                                    <option value="1.7.6.4">1.7.6.4</option>
                                                                    <option value="1.7.6.3">1.7.6.3</option>
                                                                    <option value="1.7.6.2">1.7.6.2</option>
                                                                    <option value="1.7.5.2">1.7.5.2</option>
                                                                    <option value="1.7.5.1">1.7.5.1</option>
                                                                    <option value="1.7.5.0">1.7.5.0</option>
                                                                    <option value="1.7.4.4">1.7.4.4</option>
                                                                    <option value="1.7.4.3">1.7.4.3</option>
                                                                    <option value="1.7.4.2">1.7.4.2</option>
                                                                    <option value="1.7.4.1">1.7.4.1</option>
                                                                    <option value="1.7.4">1.7.4</option>
                                                                    <option value="1.7.3.3">1.7.3.3</option>
                                                                    <option value="1.7.3.1">1.7.3.1</option>
                                                                    <option value="1.7.3.0">1.7.3.0</option>
                                                                    <option value="1.7.2.4">1.7.2.4</option>
                                                                    <option value="1.7.1.1">1.7.1.1</option>
                                                                    <option value="1.7.1.0">1.7.1.0</option>
                                                                    <option value="1.7">1.7</option>
                                                                    <option value="1.6.1.9">1.6.1.9</option>
                                                                    <option value="1.6.1.8">1.6.1.8</option>
                                                                    <option value="1.6.1.7">1.6.1.7</option>
                                                                    <option value="1.6.1.6">1.6.1.6</option>
                                                                    <option value="1.6.1.5">1.6.1.5</option>
                                                                    <option value="1.6.1.4">1.6.1.4</option>
                                                                    <option value="1.6.1.3">1.6.1.3</option>
                                                                    <option value="1.6.1.2">1.6.1.2</option>
                                                                    <option value="1.6.1.16">1.6.1.16</option>
                                                                    <option value="1.6.1.15">1.6.1.15</option>
                                                                    <option value="1.6.1.14">1.6.1.14</option>
                                                                    <option value="1.6.1.13">1.6.1.13</option>
                                                                    <option value="1.6.1.12">1.6.1.12</option>
                                                                    <option value="1.6.1.11">1.6.1.11</option>
                                                                    <option value="1.6.1.1">1.6.1.1</option>
                                                                    <option value="1.6.1.0">1.6.1.0</option>
                                                                    <option value="1.6.0.9">1.6.0.9</option>
                                                                    <option value="1.6.0.6">1.6.0.6</option>
                                                                    <option value="1.6.0.5">1.6.0.5</option>
                                                                    <option value="1.6.0.4">1.6.0.4</option>
                                                                    <option value="1.6.0.3">1.6.0.3</option>
                                                                    <option value="1.6.0.14">1.6.0.14</option>
                                                                    <option value="1.6.0.11">1.6.0.11</option>
                                                                    <option value="1.6 & 1.7">1.6 & 1.7</option>
                                                                    <option value="1.5.6.2">1.5.6.2</option>
                                                                    <option value="1.5.6.1">1.5.6.1</option>
                                                                    <option value="1.5.6.0">1.5.6.0</option>
                                                                    <option value="1.5.5.0">1.5.5.0</option>
                                                                    <option value="1.5.4.1">1.5.4.1</option>
                                                                    <option value="1.5.4.0">1.5.4.0</option>
                                                                    <option value="1.5.3.1">1.5.3.1</option>
                                                                    <option value="1.5.2.0">1.5.2.0</option>
                                                                    <option value="1.5.1.0">1.5.1.0</option>
                                                                    <option value="1.5.0.17">1.5.0.17</option>
                                                                    <option value="1.4.9.x">1.4.9.x</option>
                                                                    <option value="1.4.8.2">1.4.8.2</option>
                                                                    <option value="1.4.7.x">1.4.7.x</option>
                                                                    <option value="1.4.7.3">1.4.7.3</option>
                                                                    <option value="1.4.6.x">1.4.6.x</option>
                                                                    <option value="1.4.5.x">1.4.5.x</option>
                                                                    <option value="1.4.4.x">1.4.4.x</option>
                                                                    <option value="1.4.3.x">1.4.3.x</option>
                                                                    <option value="1.4.2.x">1.4.2.x</option>
                                                                    <option value="1.4.1.x">1.4.1.x</option>
                                                                    <option value="1.4.0.x">1.4.0.x</option>
                                                                    <option value="1.3.6.x">1.3.6.x</option>
                                                                    <option value="1.3.4.x">1.3.4.x</option>
                                                                    <option value="1.3.2.x">1.3.2.x</option>
                                                                    <option value="1.3.1.x">1.3.1.x</option>
                                                                </select>
                                                                Choose your product's Magento CMS version.<br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedPrestaShopCompatibility) && in_array($category, $AllowedPrestaShopCompatibility)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>PrestaShop Compatibility</label>
                                                        <select class="select2_tagged form-control" name="PrestaShopCompatibility">
                                                            <option value="1.7.x">1.7.x</option>
                                                            <option value="1.7.8.x">1.7.8.x</option>
                                                            <option value="1.7.7.x">1.7.7.x</option>
                                                            <option value="1.7.6.x">1.7.6.x</option>
                                                            <option value="1.7.5">1.7.5</option>
                                                            <option value="1.7.4.3">1.7.4.3</option>
                                                            <option value="1.7.4">1.7.4</option>
                                                            <option value="1.7.3.3">1.7.3.3</option>
                                                            <option value="1.7.3.1">1.7.3.1</option>
                                                            <option value="1.7.3.0">1.7.3.0</option>
                                                            <option value="1.7.2.4">1.7.2.4</option>
                                                            <option value="1.6.x">1.6.x</option>
                                                            <option value="1.6 & 1.7">1.6 & 1.7</option>
                                                            <option value="1.5.x">1.5.x</option>
                                                            <option value="1.5.3.1">1.5.3.1</option>
                                                            <option value="1.5.2.0">1.5.2.0</option>
                                                            <option value="1.5.1.0">1.5.1.0</option>
                                                            <option value="1.5.0.17">1.5.0.17</option>
                                                            <option value="1.4.9.x">1.4.9.x</option>
                                                            <option value="1.4.8.x">1.4.8.x</option>
                                                            <option value="1.4.7.x">1.4.7.x</option>
                                                            <option value="1.4.6.x">1.4.6.x</option>
                                                            <option value="1.4.5.x">1.4.5.x</option>
                                                            <option value="1.4.4.x">1.4.4.x</option>
                                                            <option value="1.4.3.x">1.4.3.x</option>
                                                            <option value="1.4.2.x">1.4.2.x</option>
                                                            <option value="1.4.1.x">1.4.1.x</option>
                                                            <option value="1.4.0.x">1.4.0.x</option>
                                                            <option value="1.3.6.x">1.3.6.x</option>
                                                            <option value="1.3.5.x">1.3.5.x</option>
                                                            <option value="1.3.4.x">1.3.4.x</option>
                                                            <option value="1.3.3.x">1.3.3.x</option>
                                                            <option value="1.3.2.x">1.3.2.x</option>
                                                            <option value="1.3.1.x">1.3.1.x</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedOpencartEngine) && in_array($category, $AllowedOpencartEngine)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Opencart Engine</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="OpencartEngine">
                                                                    <option value="4.0.0.0">4.0.0.0</option>
                                                                    <option value="3.0.3.8">3.0.3.8</option>
                                                                    <option value="3.0.3.7">3.0.3.7</option>
                                                                    <option value="3.0.3.6">3.0.3.6</option>
                                                                    <option value="3.0.3.5">3.0.3.5</option>
                                                                    <option value="3.0.3.3">3.0.3.3</option>
                                                                    <option value="3.0.3.2">3.0.3.2</option>
                                                                    <option value="3.0.2.0">3.0.2.0</option>
                                                                    <option value="2.3">2.3</option>
                                                                    <option value="2.2">2.2</option>
                                                                    <option value="2.1.x">2.1.x</option>
                                                                    <option value="2.0.3.1">2.0.3.1</option>
                                                                    <option value="2.0.1.0">2.0.1.0</option>
                                                                    <option value="2.0.0.0">2.0.0.0</option>
                                                                    <option value="1.5.6.4">1.5.6.4</option>
                                                                    <option value="1.5.6.3">1.5.6.3</option>
                                                                    <option value="1.5.6.2">1.5.6.2</option>
                                                                    <option value="1.5.6.1">1.5.6.1</option>
                                                                    <option value="1.5.6">1.5.6</option>
                                                                    <option value="1.5.5.1">1.5.5.1</option>
                                                                    <option value="1.5.4.1">1.5.4.1</option>
                                                                    <option value="1.5.3.1">1.5.3.1</option>
                                                                    <option value="1.5.2.1">1.5.2.1</option>
                                                                    <option value="1.5.1.3">1.5.1.3</option>
                                                                </select>
                                                                Choose your product's Magento CMS version.<br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?php } ?>
                                        <?Php if (!empty($category) && !empty($AllowedOpencartCompatibility) && in_array($category, $AllowedOpencartCompatibility)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Opencart Compatibility</label>
                                                        <select name="OpencartCompatibility[]" multiple="multiple">
                                                            <option value="4.0.0.0">4.0.0.0</option>
                                                            <option value="3.0.3.8">3.0.3.8</option>
                                                            <option value="3.0.3.7">3.0.3.7</option>
                                                            <option value="3.0.3.6">3.0.3.6</option>
                                                            <option value="3.0.3.5">3.0.3.5</option>
                                                            <option value="3.0.3.3">3.0.3.3</option>
                                                            <option value="3.0.3.2">3.0.3.2</option>
                                                            <option value="3.0.2.0">3.0.2.0</option>
                                                            <option value="2.3">2.3</option>
                                                            <option value="2.2">2.2</option>
                                                            <option value="2.1.x">2.1.x</option>
                                                            <option value="2.0.3.1">2.0.3.1</option>
                                                            <option value="2.0.1.0">2.0.1.0</option>
                                                            <option value="2.0.0.0">2.0.0.0</option>
                                                            <option value="1.5.6.4">1.5.6.4</option>
                                                            <option value="1.5.6.3">1.5.6.3</option>
                                                            <option value="1.5.6.2">1.5.6.2</option>
                                                            <option value="1.5.6.1">1.5.6.1</option>
                                                            <option value="1.5.6">1.5.6</option>
                                                            <option value="1.5.5.1">1.5.5.1</option>
                                                            <option value="1.5.4.1">1.5.4.1</option>
                                                            <option value="1.5.3.1">1.5.3.1</option>
                                                            <option value="1.5.2.1">1.5.2.1</option>
                                                            <option value="1.5.1.3">1.5.1.3</option>
                                                        </select>
                                                    </div>
                                                    <p>Choose OpenCart platform version(s) compatible with your product. Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?Php } ?>
                                        <?Php if (!empty($category) && !empty($AllowedOpenCartModules) && in_array($category, $AllowedOpenCartModules)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>OpenCart Modules</label>
                                                        <select name="OpenCartModules[]" multiple="multiple">
                                                            <option value="Account">Account</option>
                                                            <option value="Affiliate">Affiliate</option>
                                                            <option value="Banner">Banner</option>
                                                            <option value="Bestsellers">Bestsellers</option>
                                                            <option value="Camera Slideshow">Camera Slideshow</option>
                                                            <option value="Carousel">Carousel</option>
                                                            <option value="Category">Category</option>
                                                            <option value="Featured">Featured</option>
                                                            <option value="Google Talk">Google Talk</option>
                                                            <option value="Information">Information</option>
                                                            <option value="Latest">Latest</option>
                                                            <option value="Manufacturer">Manufacturer</option>
                                                            <option value="Slideshow">Slideshow</option>
                                                            <option value="Specials">Specials</option>
                                                            <option value="Store">Store</option>
                                                            <option value="VQmod">VQmod</option>
                                                            <option value="Welcome">Welcome</option>
                                                        </select>
                                                    </div>
                                                    <p>If your product uses OpenCart modules, check as many as are relevant.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?Php } ?>
                                        <?php if (!empty($category) && !empty($AllowedZenCartCompatibility) && in_array($category, $AllowedZenCartCompatibility)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Zen Cart Compatibility</label>
                                                        <select name="ZenCartCompatibility[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="1.5.6-1.5.7">1.5.6-1.5.7</option>
                                                            <option value="1.3.9 Only">1.3.9 Only</option>
                                                            <option value="1.3.8-1.5.4">1.3.8-1.5.4</option>
                                                        </select>
                                                    </div>
                                                    <p>If your product uses OpenCart modules, check as many as are relevant.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedJoomlaCompatibility) && in_array($category, $AllowedJoomlaCompatibility)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Joomla Compatibility</label>
                                                        <select class="select2_tagged form-control" name="JoomlaCompatibility[]" multiple="multiple">
                                                            <option value="4.1.x">4.1.x</option>
                                                            <option value="4.0.x">4.0.x</option>
                                                            <option value="3.9.x">3.9.x</option>
                                                            <option value="3.2.1">3.2.1</option>
                                                            <option value="3.2.0-3.8.x">3.2.0-3.8.x</option>
                                                            <option value="3.2.0">3.2.0</option>
                                                            <option value="3.10.x">3.10.x</option>
                                                            <option value="3.1.5">3.1.5</option>
                                                            <option value="3.1.1">3.1.1</option>
                                                            <option value="3.0.x-3.5.x">3.0.x-3.5.x</option>
                                                            <option value="3.0.2">3.0.2</option>
                                                            <option value="3.0.1">3.0.1</option>
                                                            <option value="2.5.9">2.5.9</option>
                                                            <option value="2.5.8">2.5.8</option>
                                                            <option value="2.5.7">2.5.7</option>
                                                            <option value="2.5.27">2.5.27</option>
                                                            <option value="2.5.17">2.5.17</option>
                                                            <option value="2.5.16">2.5.16</option>
                                                            <option value="2.5.14">2.5.14</option>
                                                            <option value="2.5.11">2.5.11</option>
                                                            <option value="2.5.10">2.5.10</option>
                                                            <option value="2.5.0 - 2.5.x">2.5.0 - 2.5.x</option>
                                                            <option value="1.7.x - 2.5.14">1.7.x - 2.5.14</option>
                                                            <option value="1.6.x - 2.5.x">1.6.x - 2.5.x</option>
                                                            <option value="1.5.x">1.5.x</option>
                                                            <option value="1.0.x - 1.5.x">1.0.x - 1.5.x</option>
                                                        </select>
                                                    </div>
                                                    <p>Choose Joomla CMS version(s) compatible with your product. Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?Php } ?>
                                        <?php if (!empty($category) && !empty($AllowedJoomlaBuilder) && in_array($category, $AllowedJoomlaBuilder)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Joomla Builder</label>
                                                        <select class="select2_tagged form-control" name="JoomlaBuilder[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="SP Page Builder">SP Page Builder</option>
                                                            <option value="T3 Framework">T3 Framework</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedVirtuemartCompatibility) && in_array($category, $AllowedVirtuemartCompatibility)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Virtuemart Compatibility</label>
                                                        <select class="select2_tagged form-control" name="VirtuemartCompatibility[]" multiple="multiple">
                                                            <option value="3.8.x">3.8.x</option>
                                                            <option value="3.6.x">3.6.x</option>
                                                            <option value="3.6.0">3.6.0</option>
                                                            <option value="3.4.3">3.4.3</option>
                                                            <option value="3.2">3.2</option>
                                                            <option value="3.0.x">3.0.x</option>
                                                            <option value="3.0.9">3.0.9</option>
                                                            <option value="3.0.19">3.0.19</option>
                                                            <option value="3.0.18">3.0.18</option>
                                                            <option value="3.0.17">3.0.17</option>
                                                            <option value="3.0.14">3.0.14</option>
                                                            <option value="3.0.12">3.0.12</option>
                                                            <option value="2.9.9.2">2.9.9.2</option>
                                                            <option value="2.6.10">2.6.10</option>
                                                            <option value="2.6">2.6</option>
                                                            <option value="2.0.x">2.0.x</option>
                                                            <option value="2.0.8e">2.0.8e</option>
                                                            <option value="2.0.6">2.0.6</option>
                                                            <option value="2.0.26d">2.0.26d</option>
                                                            <option value="2.0.24">2.0.24</option>
                                                            <option value="2.0.22d">2.0.22d</option>
                                                            <option value="2.0.22 - 2.6.x">2.0.22 - 2.6.x</option>
                                                            <option value="2.0.20b">2.0.20b</option>
                                                            <option value="2.0.2">2.0.2</option>
                                                            <option value="2.0.18">2.0.18</option>
                                                            <option value="2.0.16d">2.0.16d</option>
                                                            <option value="2.0.14">2.0.14</option>
                                                            <option value="2.0.12 - 2.0.21">2.0.12 - 2.0.21</option>
                                                            <option value="2.0.10">2.0.10</option>
                                                            <option value="1.1.4 - 1.1.9">1.1.4 - 1.1.9</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?Php } ?>
                                        <?php if (!empty($category) && !empty($AllowedDrupalEngine) && in_array($category, $AllowedDrupalEngine)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Opencart Engine</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="OpencartEngine">
                                                                    <option value="9.0.0">9.0.0</option>
                                                                    <option value="8.9.0">8.9.0</option>
                                                                    <option value="8.8.0">8.8.0</option>
                                                                    <option value="8.7.0">8.7.0</option>
                                                                    <option value="8.6.0">8.6.0</option>
                                                                    <option value="8.5.0">8.5.0</option>
                                                                    <option value="8.4.0">8.4.0</option>
                                                                    <option value="8.3.7">8.3.7</option>
                                                                    <option value="8.3.6">8.3.6</option>
                                                                    <option value="8.3.5">8.3.5</option>
                                                                    <option value="8.2.4">8.2.4</option>
                                                                    <option value="7.x">7.x</option>
                                                                    <option value="7.56">7.56</option>
                                                                    <option value="7.55">7.55</option>
                                                                    <option value="7.54">7.54</option>
                                                                    <option value="7.4">7.4</option>
                                                                    <option value="7.34">7.34</option>
                                                                    <option value="7.33">7.33</option>
                                                                    <option value="7.31">7.31</option>
                                                                    <option value="7.30">7.30</option>
                                                                    <option value="7.29">7.29</option>
                                                                    <option value="7.28">7.28</option>
                                                                    <option value="7.27">7.27</option>
                                                                    <option value="7.26">7.26</option>
                                                                    <option value="7.25">7.25</option>
                                                                    <option value="7.24">7.24</option>
                                                                    <option value="7.23">7.23</option>
                                                                    <option value="7.22">7.22</option>
                                                                    <option value="7.21">7.21</option>
                                                                    <option value="7.20">7.20</option>
                                                                    <option value="7.2">7.2</option>
                                                                    <option value="7.19">7.19</option>
                                                                    <option value="7.18">7.18</option>
                                                                    <option value="7.0">7.0</option>
                                                                    <option value="6.x">6.x</option>
                                                                    <option value="6.3">6.3</option>
                                                                    <option value="6.19">6.19</option>
                                                                    <option value="6.17">6.17</option>
                                                                    <option value="6.16">6.16</option>
                                                                    <option value="6.15">6.15</option>
                                                                    <option value="6.14">6.14</option>
                                                                    <option value="6.13">6.13</option>
                                                                    <option value="6.12">6.12</option>
                                                                    <option value="6.11">6.11</option>
                                                                    <option value="6.0">6.0</option>
                                                                </select>
                                                                Choose your product's Drupal platform version.<br>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedDrupalCompatibility) && in_array($category, $AllowedDrupalCompatibility)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Drupal Compatibility</label>
                                                        <select class="select2_tagged form-control" name="DrupalCompatibility[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="9.x">9.x</option>
                                                            <option value="8.x">8.x</option>
                                                            <option value="7.x">7.x</option>
                                                            <option value="6.x">6.x</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?Php } ?>

                                        <?php if (!empty($category) && !empty($AllowedProductFeatures) && in_array($category, $AllowedProductFeatures)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Product Features</label>
                                                        <select class="select2_tagged form-control" name="ProductFeatures[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="Accelerated Mobile Pages (AMP)">Accelerated Mobile Pages (AMP)</option>
                                                            <option value="Admin Panel">Admin Panel</option>
                                                            <option value="Advanced Theme Options">Advanced Theme Options</option>
                                                            <option value="Ajax">Ajax</option>
                                                            <option value="Background video">Background video</option>
                                                            <option value="Blog">Blog</option>
                                                            <option value="Bootstrap">Bootstrap</option>
                                                            <option value="CV">CV</option>
                                                            <option value="Canvas Animation">Canvas Animation</option>
                                                            <option value="Completely JS">Completely JS</option>
                                                            <option value="Drag and Drop Content">Drag and Drop Content</option>
                                                            <option value="Dropdown Menu">Dropdown Menu</option>
                                                            <option value="Dropshipping">Dropshipping</option>
                                                            <option value="Events Calendar">Events Calendar</option>
                                                            <option value="Forum">Forum</option>
                                                            <option value="GPL License">GPL License</option>
                                                            <option value="Gallery">Gallery</option>
                                                            <option value="Google map">Google map</option>
                                                            <option value="HTML 5">HTML 5</option>
                                                            <option value="HTML plus JS">HTML plus JS</option>
                                                            <option value="Hotel Booking">Hotel Booking</option>
                                                            <option value="JQuery">JQuery</option>
                                                            <option value="Lazy Load effect">Lazy Load effect</option>
                                                            <option value="Light Template">Light Template</option>
                                                            <option value="MegaMenu">MegaMenu</option>
                                                            <option value="Mobile Layout Included">Mobile Layout Included</option>
                                                            <option value="Moto CMS Landing Builder">Moto CMS Landing Builder</option>
                                                            <option value="MotoCertificate">MotoCertificate</option>
                                                            <option value="MotoCorporate">MotoCorporate</option>
                                                            <option value="Multipurpose">Multipurpose</option>
                                                            <option value="Novi Builder">Novi Builder</option>
                                                            <option value="On-line chat">On-line chat</option>
                                                            <option value="One Page Templates">One Page Templates</option>
                                                            <option value="Online Store/Shop">Online Store/Shop</option>
                                                            <option value="Parallax">Parallax</option>
                                                            <option value="Performance Optimization">Performance Optimization</option>
                                                            <option value="Portfolio">Portfolio</option>
                                                            <option value="Premium">Premium</option>
                                                            <option value="Pro">Pro</option>
                                                            <option value="Quickstart Package">Quickstart Package</option>
                                                            <option value="Real Estate Catalog">Real Estate Catalog</option>
                                                            <option value="Responsive">Responsive</option>
                                                            <option value="Restaurant Menu">Restaurant Menu</option>
                                                            <option value="Retina Ready">Retina Ready</option>
                                                            <option value="Right to left language support">Right to left language support</option>
                                                            <option value="Sample content">Sample content</option>
                                                            <option value="Search Engine Friendly">Search Engine Friendly</option>
                                                            <option value="Single Product">Single Product</option>
                                                            <option value="Sliced PSD">Sliced PSD</option>
                                                            <option value="Static">Static</option>
                                                            <option value="Tabs">Tabs</option>
                                                            <option value="Team Members">Team Members</option>
                                                            <option value="Themes Bundle">Themes Bundle</option>
                                                            <option value="Website Builder">Website Builder</option>
                                                            <option value="eCommerce">eCommerce</option>
                                                            <option value="j2store">j2store</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedColor) && in_array($category, $AllowedColor)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Color</label>
                                                        <select class="select2_tagged form-control" name="Color[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="black">black</option>
                                                            <option value="blue">blue</option>
                                                            <option value="brown">brown</option>
                                                            <option value="cyan">cyan</option>
                                                            <option value="green">green</option>
                                                            <option value="grey">grey</option>
                                                            <option value="orange">orange</option>
                                                            <option value="pink">pink</option>
                                                            <option value="purple">purple</option>
                                                            <option value="red">red</option>
                                                            <option value="white">white</option>
                                                            <option value="yellow">yellow</option>
                                                        </select>
                                                    </div>
                                                    <p>Choose additional styles that characterize your product. Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedImagesIncluded) && in_array($category, $AllowedImagesIncluded)) { ?>
                                            <div class="col-md-12">
                                                <div class="information_module new-cust">
                                                    <ul>
                                                        <li>
                                                            <div class="csutom-radio">
                                                                <h4 style="font-size: 16px;">Images Included</h4>
                                                                <br>
                                                            </div>
                                                            <div class="custom-radio">
                                                                <select name="ImagesIncluded">
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                Please specify if the product archive contains images. Select ""Yes"" if the images are included, select ""No"" if the images are used for preview only. <br>
                                                            </div>
                                                        </li>
                                                    </ul>


                                                </div><!-- ends: .information_module-->
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedToolsNeededtoUsetheProduct) && in_array($category, $AllowedToolsNeededtoUsetheProduct)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Tools Needed to Use the Product</label>
                                                        <select class="select2_tagged form-control" name="ToolsNeededtoUsetheProduct[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value=".wav editor">.wav editor like Sony Sound Forge</option>
                                                            <option value="3D Stroke Plugin">3D Stroke Plugin</option>
                                                            <option value="3dsMax 5.1+">3dsMax 5.1+</option>
                                                            <option value="3dsMax 7+">3dsMax 7+</option>
                                                            <option value="3dsMax 8">3dsMax 8</option>
                                                            <option value="Adobe After Effects CS4">Adobe After Effects CS4</option>
                                                            <option value="Adobe After Effects CS5">Adobe After Effects CS5</option>
                                                            <option value="Adobe After Effects CS6">Adobe After Effects CS6</option>
                                                            <option value="Adobe Fireworks MX+">Adobe Fireworks MX+</option>
                                                            <option value="Adobe Flash 8">Adobe Flash 8</option>
                                                            <option value="Adobe Flash 8+">Adobe Flash 8+</option>
                                                            <option value="Adobe Flash CS3">Adobe Flash CS3</option>
                                                            <option value="Adobe Flash CS4">Adobe Flash CS4</option>
                                                            <option value="Adobe Flash CS5">Adobe Flash CS5</option>
                                                            <option value="Adobe Flash MX">Adobe Flash MX</option>
                                                            <option value="Adobe Flash MX 2004 only">Adobe Flash MX 2004 only</option>
                                                            <option value="Adobe Flash MX only">Adobe Flash MX only</option>
                                                            <option value="Adobe Flash MX+">Adobe Flash MX+</option>
                                                            <option value="Adobe Illustrator 8+">Adobe Illustrator 8+</option>
                                                            <option value="Adobe Illustrator CS2">Adobe Illustrator CS2</option>
                                                            <option value="Adobe InDesign CC+">Adobe InDesign CC+</option>
                                                            <option value="Adobe Muse 2017">Adobe Muse 2017</option>
                                                            <option value="Adobe Muse 2018">Adobe Muse 2018</option>
                                                            <option value="Adobe Muse CC 2014">Adobe Muse CC 2014</option>
                                                            <option value="Adobe Muse CC 2015">Adobe Muse CC 2015</option>
                                                            <option value="Adobe Photoshop 5.5+">Adobe Photoshop 5.5+</option>
                                                            <option value="Adobe Photoshop CC+">Adobe Photoshop CC+</option>
                                                            <option value="Adobe Photoshop CS2">Adobe Photoshop CS2</option>
                                                            <option value="Any sound editor">Any sound editor</option>
                                                            <option value="Apache 1.3.x and MySQL 3.2+">Apache 1.3.x and MySQL 3.2+</option>
                                                            <option value="Apache 2+">Apache 2+</option>
                                                            <option value="Apache 2.0 or higher">Apache 2.0 or higher</option>
                                                            <option value="Apache 2.0+">Apache 2.0+</option>
                                                            <option value="Apache 2.2 or 2.4">Apache 2.2 or 2.4</option>
                                                            <option value="Apache 2.4">Apache 2.4</option>
                                                            <option value="Apache Server">Apache Server</option>
                                                            <option value="Apache Web Server 1.3+ with mod_ssl">Apache Web Server 1.3+ with mod_ssl</option>
                                                            <option value="Apache only">Apache only</option>
                                                            <option value="Apache server with the mod_rewrite module
                                                            Apache server supporting .htaccess files
                                                            PHP 5.0.0 version or higher
                                                            PHP extensions: mysql, json, curl
                                                            File manager - FTP access">Apache server with the mod_rewrite module
                                                                Apache server supporting .htaccess files
                                                                PHP 5.0.0 version or higher
                                                                PHP extensions: 'mysql', 'json', 'curl'
                                                                File manager - FTP access
                                                            </option>
                                                            <option value="Blend 3">Blend 3</option>
                                                            <option value="CRE LOADED 6.2 STANDARD AND PRO">CRE LOADED 6.2 STANDARD AND PRO</option>
                                                            <option value="Clean install without sample data">Clean install without sample data</option>
                                                            <option value="Code editing tool">Code editing tool</option>
                                                            <option value="Code editor">Code editor</option>
                                                            <option value="Corel Draw 11+">Corel Draw 11+</option>
                                                            <option value="Corel Draw 12+">Corel Draw 12+</option>
                                                            <option value="Corel Draw 9+">Corel Draw 9+</option>
                                                            <option value="CreLoaded 6.2 patch 13 only">CreLoaded 6.2 patch 13 only</option>
                                                            <option value="Drupal 6.0">Drupal 6.0</option>
                                                            <option value="Drupal 6.11">Drupal 6.11</option>
                                                            <option value="Drupal 6.12">Drupal 6.12</option>
                                                            <option value="Drupal 6.13">Drupal 6.13</option>
                                                            <option value="Drupal 6.14">Drupal 6.14</option>
                                                            <option value="Drupal 6.15">Drupal 6.15</option>
                                                            <option value="Drupal 6.16">Drupal 6.16</option>
                                                            <option value="Drupal 6.17">Drupal 6.17</option>
                                                            <option value="Drupal 6.19">Drupal 6.19</option>
                                                            <option value="Drupal 6.3">Drupal 6.3</option>
                                                            <option value="Drupal 6.x">Drupal 6.x</option>
                                                            <option value="Drupal 7.0">Drupal 7.0</option>
                                                            <option value="Drupal 7.2">Drupal 7.2</option>
                                                            <option value="Drupal 7.x">Drupal 7.x</option>
                                                            <option value="Drupal 8.x">Drupal 8.x</option>
                                                            <option value="FTP access">FTP access</option>
                                                            <option value="Facebook Account">Facebook Account</option>
                                                            <option value="Figma">Figma</option>
                                                            <option value="Flash 2004">Flash &#1052;&#1061;2004</option>
                                                            <option value="Flash 2004 or higher">Flash &#1052;&#1061;2004 or higher</option>
                                                            <option value="Flash player v. 9">Flash player v. 9</option>
                                                            <option value="ZIP package">For uncompressing a template ZIP package: WinZip 9+ (Windows); Stuffit Expander 10+ (Mac)</option>
                                                            <option value="Google Web Designer">Google Web Designer</option>
                                                            <option value="Hosting PHP4x and MySQL4x">Hosting with PHP4x and MySQL4x</option>
                                                            <option value="Hosting PHP5.2-5.4 and MySQL5x">Hosting with PHP5.2-5.4 and MySQL5x</option>
                                                            <option value="Hosting PHP5x and MySQL5x">Hosting with PHP5x and MySQL5x</option>
                                                            <option value="Hosting SSL Certificate Enabled">Hosting with SSL Certificate Enabled</option>
                                                            <option value="JigoShop 1.4.1">JigoShop 1.4.1</option>
                                                            <option value="JigoShop 1.4.9">JigoShop 1.4.9</option>
                                                            <option value="JigoShop 1.5">JigoShop 1.5</option>
                                                            <option value="JigoShop 1.6">JigoShop 1.6</option>
                                                            <option value="JigoShop 1.6.1">JigoShop 1.6.1</option>
                                                            <option value="JigoShop 1.6.2">JigoShop 1.6.2</option>
                                                            <option value="JigoShop 1.6.3">JigoShop 1.6.3</option>
                                                            <option value="JigoShop 1.6.5">JigoShop 1.6.5</option>
                                                            <option value="JigoShop 1.7">JigoShop 1.7</option>
                                                            <option value="JigoShop 1.7.3">JigoShop 1.7.3</option>
                                                            <option value="JigoShop 1.8">JigoShop 1.8</option>
                                                            <option value="Joomla! 1.0">Joomla! 1.0</option>
                                                            <option value="Joomla! 1.5.0">Joomla! 1.5.0</option>
                                                            <option value="Joomla! 1.5.x">Joomla! 1.5.x</option>
                                                            <option value="Joomla! 1.6.0">Joomla! 1.6.0</option>
                                                            <option value="Joomla! 1.6.3">Joomla! 1.6.3</option>
                                                            <option value="Joomla! 1.6.5">Joomla! 1.6.5</option>
                                                            <option value="Joomla! 1.6.x">Joomla! 1.6.x</option>
                                                            <option value="Joomla! 1.7.0">Joomla! 1.7.0</option>
                                                            <option value="Joomla! 1.7.1">Joomla! 1.7.1</option>
                                                            <option value="Joomla! 1.7.2">Joomla! 1.7.2</option>
                                                            <option value="Joomla! 1.7.3">Joomla! 1.7.3</option>
                                                            <option value="Joomla! 2.5.0">Joomla! 2.5.0</option>
                                                            <option value="Joomla! 2.5.1">Joomla! 2.5.1</option>
                                                            <option value="Joomla! 2.5.10">Joomla! 2.5.10</option>
                                                            <option value="Joomla! 2.5.11">Joomla! 2.5.11</option>
                                                            <option value="Joomla! 2.5.16">Joomla! 2.5.16</option>
                                                            <option value="Joomla! 2.5.17">Joomla! 2.5.17</option>
                                                            <option value="Joomla! 2.5.2">Joomla! 2.5.2</option>
                                                            <option value="Joomla! 2.5.27">Joomla! 2.5.27</option>
                                                            <option value="Joomla! 2.5.3">Joomla! 2.5.3</option>
                                                            <option value="Joomla! 2.5.4">Joomla! 2.5.4</option>
                                                            <option value="Joomla! 2.5.6">Joomla! 2.5.6</option>
                                                            <option value="Joomla! 2.5.7">Joomla! 2.5.7</option>
                                                            <option value="Joomla! 2.5.8">Joomla! 2.5.8</option>
                                                            <option value="Joomla! 2.5.9">Joomla! 2.5.9</option>
                                                            <option value="Joomla! 3.0.1">Joomla! 3.0.1</option>
                                                            <option value="Joomla! 3.0.2">Joomla! 3.0.2</option>
                                                            <option value="Joomla! 3.0.3">Joomla! 3.0.3</option>
                                                            <option value="Joomla! 3.1.1">Joomla! 3.1.1</option>
                                                            <option value="Joomla! 3.1.5">Joomla! 3.1.5</option>
                                                            <option value="Joomla! 3.2">Joomla! 3.2</option>
                                                            <option value="Joomla! 3.2.1">Joomla! 3.2.1</option>
                                                            <option value="Joomla! 3.2.2">Joomla! 3.2.2</option>
                                                            <option value="Joomla! 3.2.3">Joomla! 3.2.3</option>
                                                            <option value="Joomla! 3.3.0">Joomla! 3.3.0</option>
                                                            <option value="Joomla! 3.3.1">Joomla! 3.3.1</option>
                                                            <option value="Joomla! 3.3.3">Joomla! 3.3.3</option>
                                                            <option value="Joomla! 3.3.4">Joomla! 3.3.4</option>
                                                            <option value="Joomla! 3.3.6">Joomla! 3.3.6</option>
                                                            <option value="Joomla! 3.4.x">Joomla! 3.4.x</option>
                                                            <option value="Joomla! 3.9x">Joomla! 3.9x</option>
                                                            <option value="Joomla! 4.0.x">Joomla! 4.0.x</option>
                                                            <option value="Joomla! 4.1.x">Joomla! 4.1.x</option>
                                                            <option value="Loaded7 V7.001.0.0">Loaded7 V7.001.0.0</option>
                                                            <option value="Magento 1.1.6">Magento 1.1.6</option>
                                                            <option value="Magento 1.1.7">Magento 1.1.7</option>
                                                            <option value="Magento 1.1.8">Magento 1.1.8</option>
                                                            <option value="Magento 1.2.x">Magento 1.2.x</option>
                                                            <option value="Magento 1.3.0">Magento 1.3.0</option>
                                                            <option value="Magento 1.3.2.x">Magento 1.3.2.x</option>
                                                            <option value="Magento 1.3.x">Magento 1.3.x</option>
                                                            <option value="Magento 2.2.7">Magento 2.2.7</option>
                                                            <option value="Magento 2.3.0">Magento 2.3.0</option>
                                                            <option value="Magento 2.3.1">Magento 2.3.1</option>
                                                            <option value="Magento 2.3.2">Magento 2.3.2</option>
                                                            <option value="Magento community edition 1.4.0">Magento community edition 1.4.0</option>
                                                            <option value="Magento community edition 1.4.1.x">Magento community edition 1.4.1.x</option>
                                                            <option value="Magento community edition 1.4.2.x">Magento community edition 1.4.2.x</option>
                                                            <option value="Magento community edition 1.5.0.x">Magento community edition 1.5.0.x</option>
                                                            <option value="Magento community edition 1.5.1.x">Magento community edition 1.5.1.x</option>
                                                            <option value="Magento community edition 1.6.0.x">Magento community edition 1.6.0.x</option>
                                                            <option value="Magento community edition 1.6.1.x">Magento community edition 1.6.1.x</option>
                                                            <option value="Magento community edition 1.6.2.x">Magento community edition 1.6.2.x</option>
                                                            <option value="Magento community edition 1.7.0.x">Magento community edition 1.7.0.x</option>
                                                            <option value="Magento community edition 1.8.0.x">Magento community edition 1.8.0.x</option>
                                                            <option value="Magento community edition 1.8.1.x">Magento community edition 1.8.1.x</option>
                                                            <option value="Magento community edition 1.9.x">Magento community edition 1.9.x</option>
                                                            <option value="Mambo 4.6.2">Mambo 4.6.2</option>
                                                            <option value="Microsoft Expression Blend 4">Microsoft Expression Blend 4</option>
                                                            <option value="MySQL 4.1.13+, PHP 5.3+">MySQL 4.1.13+, PHP 5.3+</option>
                                                            <option value="MySQL 4.1.14 or later">MySQL 4.1.14 or later</option>
                                                            <option value="MySQL 4.1.14+">MySQL 4.1.14+</option>
                                                            <option value="MySQL 4.1.3 or higher">MySQL 4.1.3 or higher</option>
                                                            <option value="MySQL 4.1.3+">MySQL 4.1.3+</option>
                                                            <option value="MySQL 5.6">MySQL 5.6</option>
                                                            <option value="MySQL 5.7">MySQL 5.7</option>
                                                            <option value="MySQL 8">MySQL 8</option>
                                                            <option value="extensions .php, .inc, .zip, .css, .js">MySQL database server
                                                                Capability of uploading files over 1Mb size to the server
                                                                Capability of uploading files with the following extensions: '.php', '.inc', '.zip', '.css', '.js' as well as the graphic image files.</option>
                                                            <option value="No additional plugins required">No additional plugins required</option>
                                                            <option value="Notepad++ or any php-editor">Notepad++ or any php-editor</option>
                                                            <option value="OpenCart 1.5.1.3">OpenCart 1.5.1.3</option>
                                                            <option value="OpenCart 1.5.2.1">OpenCart 1.5.2.1</option>
                                                            <option value="OpenCart 1.5.3.1">OpenCart 1.5.3.1</option>
                                                            <option value="OpenCart 1.5.4.1">OpenCart 1.5.4.1</option>
                                                            <option value="OpenCart 1.5.5.1">OpenCart 1.5.5.1</option>
                                                            <option value="OpenCart 1.5.6">OpenCart 1.5.6</option>
                                                            <option value="OpenCart 1.5.6.1">OpenCart 1.5.6.1</option>
                                                            <option value="OpenCart 1.5.6.2">OpenCart 1.5.6.2</option>
                                                            <option value="OpenCart 1.5.6.3">OpenCart 1.5.6.3</option>
                                                            <option value="OpenCart 1.5.6.4">OpenCart 1.5.6.4</option>
                                                            <option value="OpenCart 2.0.1.0">OpenCart 2.0.1.0</option>
                                                            <option value="OpenCart 2.0.3.1">OpenCart 2.0.3.1</option>
                                                            <option value="OpenCart 3.0.2.0">OpenCart 3.0.2.0</option>
                                                            <option value="OsCommerce 2.3.1">OsCommerce 2.3.1</option>
                                                            <option value="OsCommerce 2.3.3">OsCommerce 2.3.3</option>
                                                            <option value="OsCommerce 2.3.4">OsCommerce 2.3.4</option>
                                                            <option value="magento themes designed">Our magento themes are designed to be used with clean install without sample data that is provided with the default theme.</option>
                                                            <option value="PHP 4.3.2+">PHP 4.3.2+</option>
                                                            <option value="PHP 5+">PHP 5+</option>
                                                            <option value="PHP 5.0+">PHP 5.0+</option>
                                                            <option value="PHP 5.2.14 or higher">PHP 5.2.14 or higher</option>
                                                            <option value="PHP 5.2.14+">PHP 5.2.14+</option>
                                                            <option value="PHP 5.3+">PHP 5.3+</option>
                                                            <option value="PHP 5.4+">PHP 5.4+</option>
                                                            <option value="PHP 5.6.5-5.6x">PHP 5.6.5-5.6x</option>
                                                            <option value="PHP 7.0.2">PHP 7.0.2</option>
                                                            <option value="PHP 7.0.4">PHP 7.0.4</option>
                                                            <option value="PHP 7.0.6.-7.0.x">PHP 7.0.6.-7.0.x</option>
                                                            <option value="PHP 7.1.3+">PHP 7.1.3+</option>
                                                            <option value="PHP 7.1.x">PHP 7.1.x</option>
                                                            <option value="PHP 7.2.x">PHP 7.2.x</option>
                                                            <option value="PHP 7.3.x">PHP 7.3.x</option>
                                                            <option value="PHP 7.4.x">PHP 7.4.x</option>
                                                            <option value="PHP 8.0.x">PHP 8.0.x</option>
                                                            <option value="PHP code editor">PHP code editor</option>
                                                            <option value="PHP configured to support CURL with OpenSSL">PHP configured to support CURL with OpenSSL</option>
                                                            <option value="PHP editing tool">PHP editing tool</option>
                                                            <option value="PHP editor">PHP editor</option>
                                                            <option value="PHP editor.">PHP editor.</option>
                                                            <option value="PHP supporting CURL with OpenSSL">PHP supporting CURL with OpenSSL</option>
                                                            <option value="PHP v. 5 or higher">PHP v. 5 or higher</option>
                                                            <option value="PHP-EDITOR">PHP-EDITOR</option>
                                                            <option value="Paid WP Job Manager Plugin">Paid WP Job Manager Plugin</option>
                                                            <option value="Paypal Only">Paypal Only</option>
                                                            <option value="PhpBB2 board">PhpBB2 board</option>
                                                            <option value="PowerPoint 2003 or 2007 (better)">PowerPoint 2003 or 2007 (better)</option>
                                                            <option value="Powerpoint 2007 (recommended) or Powerpoint 2003">Powerpoint 2007 (recommended) or Powerpoint 2003</option>
                                                            <option value="PrestaShop 1.7.x">PrestaShop 1.7.x</option>
                                                            <option value="Prestashop 1.3.1.x">Prestashop 1.3.1.x</option>
                                                            <option value="Prestashop 1.3.2.x">Prestashop 1.3.2.x</option>
                                                            <option value="Prestashop 1.3.4.x">Prestashop 1.3.4.x</option>
                                                            <option value="Prestashop 1.3.6.x">Prestashop 1.3.6.x</option>
                                                            <option value="Prestashop 1.4.0.x">Prestashop 1.4.0.x</option>
                                                            <option value="Prestashop 1.4.1.x">Prestashop 1.4.1.x</option>
                                                            <option value="Prestashop 1.4.2.x">Prestashop 1.4.2.x</option>
                                                            <option value="Prestashop 1.4.4.x">Prestashop 1.4.4.x</option>
                                                            <option value="Prestashop 1.4.5.x">Prestashop 1.4.5.x</option>
                                                            <option value="Prestashop 1.4.6.x">Prestashop 1.4.6.x</option>
                                                            <option value="Prestashop 1.4.7.3">Prestashop 1.4.7.3</option>
                                                            <option value="Prestashop 1.4.7.x">Prestashop 1.4.7.x</option>
                                                            <option value="Prestashop 1.4.8.2">Prestashop 1.4.8.2</option>
                                                            <option value="Prestashop 1.4.9.x">Prestashop 1.4.9.x</option>
                                                            <option value="Prestashop 1.5.0.17">Prestashop 1.5.0.17</option>
                                                            <option value="Prestashop 1.5.1.0">Prestashop 1.5.1.0</option>
                                                            <option value="Prestashop 1.5.2.0">Prestashop 1.5.2.0</option>
                                                            <option value="Prestashop 1.5.3.1">Prestashop 1.5.3.1</option>
                                                            <option value="Prestashop 1.5.4.0">Prestashop 1.5.4.0</option>
                                                            <option value="Prestashop 1.5.4.1">Prestashop 1.5.4.1</option>
                                                            <option value="Prestashop 1.5.5.0">Prestashop 1.5.5.0</option>
                                                            <option value="Prestashop 1.5.6.0">Prestashop 1.5.6.0</option>
                                                            <option value="Prestashop 1.5.6.1">Prestashop 1.5.6.1</option>
                                                            <option value="Prestashop 1.5.6.2">Prestashop 1.5.6.2</option>
                                                            <option value="Prestashop 1.6.0.11">Prestashop 1.6.0.11</option>
                                                            <option value="Prestashop 1.6.0.14">Prestashop 1.6.0.14</option>
                                                            <option value="Prestashop 1.6.0.4">Prestashop 1.6.0.4</option>
                                                            <option value="Prestashop 1.6.0.5">Prestashop 1.6.0.5</option>
                                                            <option value="Prestashop 1.6.0.6">Prestashop 1.6.0.6</option>
                                                            <option value="Prestashop 1.6.0.9">Prestashop 1.6.0.9</option>
                                                            <option value="Prestashop 1.6.1.0">Prestashop 1.6.1.0</option>
                                                            <option value="Prestashop 1.6.1.4">Prestashop 1.6.1.4</option>
                                                            <option value="Right to Left version included">Right to Left version included</option>
                                                            <option value="Runs on most server configurations">Runs on most server configurations</option>
                                                            <option value="SUPPORT .php, .inc,  .zip, .css, .js - files">SUPPORT .php, .inc, .zip, .css, .js - files</option>
                                                            <option value="SWISHMAX 2004.09.10">SWISHMAX 2004.09.10</option>
                                                            <option value="SWISHMAX 2006.06.29">SWISHMAX 2006.06.29</option>
                                                            <option value="SWiSHmax 2.0 Build 2007.09.25">SWiSHmax 2.0 Build 2007.09.25</option>
                                                            <option value="SWiSHmax 2.0 Build 2007.11.02">SWiSHmax 2.0 Build 2007.11.02</option>
                                                            <option value="SWiSHmax 2.0 Build 2008.01.31">SWiSHmax 2.0 Build 2008.01.31</option>
                                                            <option value="SWiSHmax 2.0 Build 2008.08.12">SWiSHmax 2.0 Build 2008.08.12</option>
                                                            <option value="SWiSHmax 2.0 Build 2009.06.02">SWiSHmax 2.0 Build 2009.06.02</option>
                                                            <option value="SWiSHmax 3 Build 2009.11.30">SWiSHmax 3 Build 2009.11.30</option>
                                                            <option value="SWiSHmax 3.0 Build 2009.09.04">SWiSHmax 3.0 Build 2009.09.04</option>
                                                            <option value="SWiSHmax 4 build 2010.11.02">SWiSHmax 4 build 2010.11.02</option>
                                                            <option value="SWiSHmax 4 build 2011.03.18">SWiSHmax 4 build 2011.03.18</option>
                                                            <option value="Sketch">Sketch</option>
                                                            <option value="Sublime Text2 or later, Notepad++">Sublime Text2 or later, Notepad++</option>
                                                            <option value="Sublime Text2 or later, Notepad++ or any php-editor">Sublime Text2 or later, Notepad++ or any php-editor</option>
                                                            <option value="Supported by the current versions of popular browsers">Supported by the current versions of popular browsers</option>
                                                            <option value="Sure Target 2 Plugin">Sure Target 2 Plugin</option>
                                                            <option value="Sure Target Plugin">Sure Target Plugin</option>
                                                            <option value="TRAPCODE PARTICULAR PLUGIN">TRAPCODE PARTICULAR PLUGIN</option>
                                                            <option value="Linux Operating System">The Linux Operating System</option>
                                                            <option value="Trapcode 3D Stroke Plugin">Trapcode 3D Stroke Plugin</option>
                                                            <option value="Trapcode: Form Plugin">Trapcode: Form Plugin</option>
                                                            <option value="Twitch Plugin">Twitch Plugin</option>
                                                            <option value="VC Reflect Plugin">VC Reflect Plugin</option>
                                                            <option value="Version with Trapcode Particular included">Version with Trapcode Particular included</option>
                                                            <option value="Virtuemart 1.1.4">Virtuemart 1.1.4</option>
                                                            <option value="Virtuemart 1.1.6">Virtuemart 1.1.6</option>
                                                            <option value="Virtuemart 1.1.7">Virtuemart 1.1.7</option>
                                                            <option value="Virtuemart 1.1.8">Virtuemart 1.1.8</option>
                                                            <option value="Virtuemart 1.1.9">Virtuemart 1.1.9</option>
                                                            <option value="Virtuemart 2.0.10">Virtuemart 2.0.10</option>
                                                            <option value="Virtuemart 2.0.12">Virtuemart 2.0.12</option>
                                                            <option value="Virtuemart 2.0.14">Virtuemart 2.0.14</option>
                                                            <option value="Virtuemart 2.0.16d">Virtuemart 2.0.16d</option>
                                                            <option value="Virtuemart 2.0.18">Virtuemart 2.0.18</option>
                                                            <option value="Virtuemart 2.0.2">Virtuemart 2.0.2</option>
                                                            <option value="Virtuemart 2.0.20b">Virtuemart 2.0.20b</option>
                                                            <option value="Virtuemart 2.0.22a">Virtuemart 2.0.22a</option>
                                                            <option value="Virtuemart 2.0.22d">Virtuemart 2.0.22d</option>
                                                            <option value="Virtuemart 2.0.24">Virtuemart 2.0.24</option>
                                                            <option value="Virtuemart 2.0.26d">Virtuemart 2.0.26d</option>
                                                            <option value="Virtuemart 2.0.6">Virtuemart 2.0.6</option>
                                                            <option value="Virtuemart 2.0.8e">Virtuemart 2.0.8e</option>
                                                            <option value="Virtuemart 2.0.x">Virtuemart 2.0.x</option>
                                                            <option value="Virtuemart 2.6">Virtuemart 2.6</option>
                                                            <option value="Virtuemart 2.6.10">Virtuemart 2.6.10</option>
                                                            <option value="Virtuemart 2.9.9.2">Virtuemart 2.9.9.2</option>
                                                            <option value="Virtuemart 3.0">Virtuemart 3.0</option>
                                                            <option value="Virtuemart 3.0.x">Virtuemart 3.0.x</option>
                                                            <option value="Visual Studio">Visual Studio</option>
                                                            <option value="WebMatrix">WebMatrix</option>
                                                            <option value="WooCommerce 2.0.14">WooCommerce 2.0.14</option>
                                                            <option value="WooCommerce 2.0.18">WooCommerce 2.0.18</option>
                                                            <option value="WooCommerce 2.0.19">WooCommerce 2.0.19</option>
                                                            <option value="WooCommerce 2.1.12">WooCommerce 2.1.12</option>
                                                            <option value="WooCommerce 2.1.9">WooCommerce 2.1.9</option>
                                                            <option value="WooCommerce 2.3.x">WooCommerce 2.3.x</option>
                                                            <option value="WooCommerce 3.0.x">WooCommerce 3.0.x</option>
                                                            <option value="WooCommerce 3.1.x">WooCommerce 3.1.x</option>
                                                            <option value="WooCommerce 3.x">WooCommerce 3.x</option>
                                                            <option value="WordPress 2.1.x">WordPress 2.1.x</option>
                                                            <option value="WordPress 2.3.x">WordPress 2.3.x</option>
                                                            <option value="WordPress 2.6">WordPress 2.6</option>
                                                            <option value="WordPress 2.7">WordPress 2.7</option>
                                                            <option value="WordPress 2.8">WordPress 2.8</option>
                                                            <option value="WordPress 2.9">WordPress 2.9</option>
                                                            <option value="WordPress 3.0">WordPress 3.0</option>
                                                            <option value="WordPress 3.1">WordPress 3.1</option>
                                                            <option value="WordPress 3.1.3">WordPress 3.1.3</option>
                                                            <option value="WordPress 3.2.1">WordPress 3.2.1</option>
                                                            <option value="WordPress 3.3">WordPress 3.3</option>
                                                            <option value="WordPress 3.3.1">WordPress 3.3.1</option>
                                                            <option value="WordPress 3.3.2">WordPress 3.3.2</option>
                                                            <option value="WordPress 3.4.x">WordPress 3.4.x</option>
                                                            <option value="WordPress 3.5+">WordPress 3.5+</option>
                                                            <option value="WordPress 3.5.x">WordPress 3.5.x</option>
                                                            <option value="WordPress 3.6.x">WordPress 3.6.x</option>
                                                            <option value="WordPress 3.7.x">WordPress 3.7.x</option>
                                                            <option value="WordPress 3.8.x">WordPress 3.8.x</option>
                                                            <option value="WordPress 3.9.x">WordPress 3.9.x</option>
                                                            <option value="WordPress 4.0.x">WordPress 4.0.x</option>
                                                            <option value="WordPress 4.1.x">WordPress 4.1.x</option>
                                                            <option value="WordPress 4.2.x">WordPress 4.2.x</option>
                                                            <option value="WordPress 4.2.x-4.9.x">WordPress 4.2.x-4.9.x</option>
                                                            <option value="WordPress 4.3.x">WordPress 4.3.x</option>
                                                            <option value="WordPress 5.0-5.2.x">WordPress 5.0-5.2.x</option>
                                                            <option value="WordPress 5.6.x">WordPress 5.6.x</option>
                                                            <option value="WordPress 5.7.x">WordPress 5.7.x</option>
                                                            <option value="WordPress 5.8.x">WordPress 5.8.x</option>
                                                            <option value="WordPress 5.9.x">WordPress 5.9.x</option>
                                                            <option value="WordPress 6.0.x">WordPress 6.0.x</option>
                                                            <option value="Wordpress 2.0.1 - 2.0.5">Wordpress 2.0.1 - 2.0.5</option>
                                                            <option value=">ZIP archivator">ZIP archivator</option>
                                                            <option value="ZIP unarchiver">ZIP unarchiver</option>
                                                            <option value="Zen Cart 1.3.6 only">Zen Cart 1.3.6 only</option>
                                                            <option value="Zen Cart 1.3.8 only">Zen Cart 1.3.8 only</option>
                                                            <option value="Zen Cart 1.3.9 only">Zen Cart 1.3.9 only</option>
                                                            <option value="Zen Cart 1.5.x">Zen Cart 1.5.x</option>
                                                            <option value="magento 2.2.2">magento 2.2.2</option>
                                                            <option value="magento 2.2.3">magento 2.2.3</option>
                                                            <option value="nginx 1.8">nginx 1.8</option>
                                                            <option value="nginx 1.x">nginx 1.x</option>
                                                            <option value="only 6.5-7.8 and 8.0 version supported">only 6.5-7.8 and 8.0 version supported</option>
                                                            <option value="osCommerce  v2.2">osCommerce v2.2 Release Candidate 1</option>
                                                            <option value="osCommerce 2.2 MS2">osCommerce 2.2 MS2</option>
                                                            <option value="osCommerce v2.2 RC2a">osCommerce v2.2 RC2a</option>
                                                        </select>
                                                    </div>
                                                    <p>Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedWebForms) && in_array($category, $AllowedWebForms)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Web Forms</label>
                                                        <select class="select2_tagged form-control" name="WebForms[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="Advanced Search">Advanced Search</option>
                                                            <option value="Booking Form">Booking Form</option>
                                                            <option value="Contact Form">Contact Form</option>
                                                            <option value="Login Form">Login Form</option>
                                                            <option value="Newsletter Subscription">Newsletter Subscription</option>
                                                            <option value="Search Form">Search Form</option>
                                                            <option value="User Registration">User Registration</option>
                                                        </select>
                                                    </div>
                                                    <p>Choose web form types that are available in your product. Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedCurrencies) && in_array($category, $AllowedCurrencies)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Currencies</label>
                                                        <select class="select2_tagged form-control" name="Currencies[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="EUR">EUR</option>
                                                            <option value="GBP">GBP</option>
                                                            <option value="USD">USD</option>
                                                        </select>
                                                    </div>
                                                    <p>Choose additional styles that characterize your product. Check as many as are applicable.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <?php if (!empty($category) && !empty($AllowedLanguageSupport) && in_array($category, $AllowedLanguageSupport)) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="select-multiple">
                                                        <label>Language Support</label>
                                                        <select class="select2_tagged form-control" name="LanguageSupport[]" multiple="multiple">
                                                            <option value=""></option>
                                                            <option value="Deutsch">Deutsch</option>
                                                            <option value="Dutch">Dutch</option>
                                                            <option value="English">English</option>
                                                            <option value="French">French</option>
                                                            <option value="German">German</option>
                                                            <option value="Italian">Italian</option>
                                                            <option value="Japanese">Japanese</option>
                                                            <option value="Polish">Polish</option>
                                                            <option value="Portuguese (Brazilian)">Portuguese (Brazilian)</option>
                                                            <option value="Russian">Russian</option>
                                                            <option value="Spanish">Spanish</option>
                                                            <option value="Swedish">Swedish</option>
                                                            <option value="Ukrainian">Ukrainian</option>
                                                        </select>
                                                    </div>
                                                    <p>Changelog stores all changed and updates you've made. Let your clients know how your product evolved by <a href="">keeping a changelog</a>.</p>
                                                </div>
                                            </div><!-- ends:.col-md-6 -->
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="select-multiple">
                                                    <label>Tags </label>
                                                    <style>
                                                        li {
                                                            z-index: 1;
                                                        }
                                                    </style>
                                                    <span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" data-select2-id="5" style="width: 420px;"><span class="selection">
                                                            <span style="height:100px;" class="select2-selection select2-selection--multiple form-control" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                                                                <ul class="select2-selection__rendered" id="listtags">
                                                                    <p style="z-index: 1;" id="pht" class="position-absolute">type tags here and press Enter</p>
                                                                    <input style="display: none;" type="text" name="tags" id="tags">
                                                                    <input style="height:100px; z-index: 0; text-align:right; position:absolute; top: 1px; left: 0px; background-color: transparent;" class="border-none" type="text" placeholder="" name="" id="addtags">
                                                                </ul>
                                                            </span>
                                                        </span>
                                                        <span class="dropdown-wrapper" aria-hidden="true">

                                                        </span>
                                                    </span>
                                                </div>
                                                <p>Enter maximum of 20 comma delimited tags, these will help users find your product using the site search. E.g: minimal, clean, modern, eCommerce, store, multipurpose, blog, form, Elementor Builder, etc.</p>
                                            </div><!-- ends: .form-group -->
                                        </div>
                                    </div><!-- ends: .row -->
                                </div><!-- ends: .upload_modules -->
                            </div><!-- ends: .upload_modules -->
                            <div class="upload_modules pricing--info">
                                <div class="modules__title">
                                    <h4 style="font-size: 20px;"><span style="font-size: 20px;" class="primary">TemplatePlus</span> Subscription</h4>
                                </div><!-- ends: .module_title -->
                                <div class="modules__content">


                                    <div class="col-md-12" id="vox">
                                        <div class="information_module new-cust">
                                            <ul>
                                                <li>
                                                    <div class="custom-radio">
                                                        <input type="checkbox" id="AddInTempatePlus" class="" name="AddToTemplatePlusSubscription" value="on">
                                                        <label id="Gfont" style="color: var(--green);" for="AddInTempatePlus">
                                                            <span class="circle">
                                                            </span> Make this item available in TemplatePlus Subscription <br>
                                                        </label>
                                                    </div>
                                                    <div class="custom-radio">
                                                        Increase your brand recognition, deliver your products to a huge audience, and get additional profit. <a href="">More info here</a>
                                                    </div>
                                                </li>
                                            </ul>


                                        </div><!-- ends: .information_module-->
                                        <!--
                                                  <span style="color: red;" id="UploadToTemplatePlusError">error</span>
                                              -->
                                    </div>


                                    <!-- ends: form -->
                                </div>
                            </div><!-- ends: .dashboard_contents -->
                            <div class="upload_modules pricing--info">
                                <div class="modules__title">
                                    <h4><span class="primary">Support</span></h4>
                                </div><!-- ends: .module_title -->
                                <div class="modules__content">


                                    <div class="col-md-12" id="vox">
                                        <div class="information_module new-cust">
                                            <ul>
                                                <li>
                                                    <div class="custom-radio">
                                                        <input type="checkbox" id="Support" class="" name="Support" value="on">
                                                        <label id="Gfont" style="color: var(--green);" for="Support">
                                                            <span class="circle">
                                                            </span>Extra 6 months of support option <br>
                                                        </label>
                                                    </div>
                                                    <div class="custom-radio">

                                                        In your current global setting you allow selling extra 6 months of support. Read item <a href="">support policy</a> to know more.
                                                    </div>
                                                </li>
                                            </ul>


                                        </div><!-- ends: .information_module-->
                                        <!--
                                                  <span style="color: red;" id="UploadToTemplatePlusError">error</span>
                                              -->
                                    </div>


                                    <!-- ends: form -->
                                </div>
                            </div><!-- ends: .dashboard_contents -->

                            <div class="upload_modules pricing--info">
                                <div class="modules__title">
                                    <h4>Price & License</h4>
                                </div><!-- ends: .module_title -->
                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php if (!empty($ProductSellAsFree)) { ?>
                                                    <span>Your product will be added to the <span class="primary">TemplateOne</span> marketplace as a FREE item.</span>
                                                    <input type="text" class="d-none invisible" name="SellFree">
                                                <?php } ?>

                                                <?php if (empty($ProductSellAsFree)) { ?>
                                                    <label for="ProductPrice">Product Price</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">&euro;</span>
                                                        <input type="text" name="ProductPrice" onchange="VerifyPrice()" id="ProductPrice" class="text_field" placeholder="200">
                                                    </div>
                                                    <div>
                                                        <p>Available price range in this category: &euro;0 - &euro;999</p>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div><!-- ends: .col-md-6 -->
                                    </div><!-- ends: .row -->
                                </div><!-- ends: .modules__content -->
                            </div><!-- ends: .upload_modules -->
                            <div class="btns m-top-40">
                                <input type="submit" id="validate_data" name="validate_data" class="w-100 btn btn-lg btn-primary m-right-15" value="Save And Upload">
                            </div>
                        </div><!-- ends: .col-md-8 -->
                    </div><!-- ends: .row -->
                </div><!-- ends: .container -->
            </div><!-- ends: .dashboard_menu_area -->
        </section><!-- ends: .dashboard-area -->
        <?php $main->footer(); ?>
    </form>
</body>
<!-- inject:js-->
<?php $main->script_src(); ?>

<?php if ($next_to_addProduct == true) { ?>
    <script>
        $(document).ready(function() {
            $('#SelectCategory').hide();
            $('#AddProduct').show();
        })
    </script>
<?php } ?>

<script>
    $(window).ready(function() {
        $("form").on("keypress", function(event) {
            var keyPressed = event.keyCode || event.which;
            if (keyPressed === 13) {
                alert("You pressed the Enter key!!");
                event.preventDefault();
                return false;
            }
        });
    });
</script>

<script>
    function isNumeric(num) {
        return !isNaN(num)
    }

    const MainFile__input = document.querySelector('#MainFile');
    const MainFile = MainFile__input.closest(".drop-zone");

    MainFile.addEventListener("click", (e) => {
        MainFile__input.click();
    });

    MainFile__input.addEventListener("change", (e) => {
        if (MainFile__input.files[0].type == 'application/x-zip-compressed') {
            if (MainFile__input.files.length) {
                updateMainFile(MainFile, MainFile__input.files[0]);
            }
        } else {
            MainFile.style.border = "1px solid red"
        }
    });


    MainFile.addEventListener("drop", (e) => {
        e.preventDefault();
        if (e.dataTransfer.files.type == 'application/x-zip-compressed') {
            if (e.dataTransfer.files.length) {
                MainFile__input.files = e.dataTransfer.files;
                updateMainFile(MainFile, e.dataTransfer.files[0]);
            }
        }
        MainFile.classList.remove("drop-zone--over");
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} MainFile
     * @param {File} file
     */
    function updateMainFile(MainFile, file) {
        let thumbnailElement = MainFile.querySelector(".file__thumb");

        if (MainFile.querySelector('#card-uploadFile')) {
            MainFile.querySelector('#card-uploadFile').style.display = "none";
        }

        // First time - remove the prompt
        if (MainFile.querySelector(".drop-zone__prompt")) {
            MainFile.querySelector(".drop-zone__prompt").remove();
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("file__thumb");
            MainFile.appendChild(thumbnailElement);
        }

        const icon = document.createElement('i');
        icon.classList.add('bi');
        icon.classList.add('bi-file-zip-fill');
        thumbnailElement.appendChild(icon);

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files

        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };

        const MainFileResult = true;
    }
    //
    const MainImage__input = document.querySelector('#MainImage');
    const MainImage = MainImage__input.closest(".drop-zone");

    MainImage.addEventListener("click", (e) => {
        MainImage__input.click();
    });

    MainImage__input.addEventListener("change", (e) => {
        if (MainImage__input.files[0].type == 'image/png') {
            MainImage.style.border = "1px solid var(--primary)";
            if (MainImage__input.files.length) {
                updateMainImage(MainImage, MainImage__input.files[0]);
            }
        } else {
            if (document.querySelector('.drop-zone__thumb')) {
                document.querySelector('.drop-zone__thumb').remove()
            }
            MainImage.querySelector(".drop-zone__prompt").style.display = "block";
            MainImage.style.border = "1px solid red";
        }
    });

    MainImage.addEventListener("dragover", (e) => {
        e.preventDefault();
        MainImage.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
        MainImage.addEventListener(type, (e) => {
            MainImage.classList.remove("drop-zone--over");
        });
    });

    MainImage.addEventListener("drop", (e) => {
        e.preventDefault();
        if (e.dataTransfer.files[0].type == 'image/png') {
            MainImage.style.border = "1px solid var(--primary)";
            if (e.dataTransfer.files.length) {
                MainImage__input.files = e.dataTransfer.files;
                updateMainImage(MainImage, e.dataTransfer.files[0]);
            }
        } else {
            if (document.querySelector('.drop-zone__thumb')) {
                document.querySelector('.drop-zone__thumb').remove()
            }
            MainImage.querySelector(".drop-zone__prompt").style.display = "block";
            MainImage.style.border = "1px solid red";
        }
        MainImage.classList.remove("drop-zone--over");
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} MainImage
     * @param {File} file
     */
    function updateMainImage(MainImage, file) {
        let thumbnailElement = MainImage.querySelector(".drop-zone__thumb");
        MainImage.style.border = "none";
        document.getElementById('start').remove()

        if (MainImage.querySelector('#card-image')) {
            MainImage.querySelector('#card-image').style.display = "none";
        }

        if (MainImage.querySelector('#card-uploadFile')) {
            MainImage.querySelector('#card-uploadFile').style.display = "none";
        }

        // First time - remove the prompt
        if (file.type == 'image/png') {
            if (MainImage.querySelector(".drop-zone__prompt")) {
                MainImage.querySelector(".drop-zone__prompt").style.display = "none";
            }
        } else {
            if (MainImage.querySelector(".drop-zone__prompt")) {
                MainImage.querySelector(".drop-zone__prompt").style.display = "block";
            }
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            MainImage.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = function() {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };

        const MainImageResult = true;

    }

    MainImage__input.onchange = function() {
        var url = URL.createObjectURL(this.files[0]);
        var img = new Image();
        img.src = url;
        img.onload = function() {

            document.querySelector('.drop-zone__thumb').style.width = 700 + "px"
            document.querySelector('.drop-zone__thumb').style.height = 300 + "px"

        }
    }

    const Slider1__input = document.querySelector('#Slider1');
    const Slider1 = Slider1__input.closest(".drop-zone");

    Slider1.addEventListener("click", (e) => {
        Slider1__input.click();
    });

    Slider1__input.addEventListener("change", (e) => {
        if (Slider1__input.files[0].type == 'image/png') {
            Slider1.style.border = "1px solid var(--primary)";
            if (Slider1__input.files.length) {
                Slider1.style.padding = "3px";
                updateSlider1(Slider1, Slider1__input.files[0]);
            }
        } else {
            Slider1.style.padding = "25px";
            Slider1.querySelector(".drop-zone__prompt").style.display = "block";
            Slider1.style.border = "1px solid red";
        }
    });

    Slider1.addEventListener("dragover", (e) => {
        e.preventDefault();
        Slider1.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
        Slider1.addEventListener(type, (e) => {
            Slider1.classList.remove("drop-zone--over");
        });
    });

    Slider1.addEventListener("drop", (e) => {
        e.preventDefault();
        if (e.dataTransfer.files[0].type == 'image/png') {
            Slider1.style.border = "1px solid var(--primary)";
            if (e.dataTransfer.files.length) {
                Slider1.style.padding = "3px";
                Slider1__input.files = e.dataTransfer.files;
                updateSlider1(Slider1, e.dataTransfer.files[0]);
            }
        } else {
            Slider1.style.padding = "25px";
            Slider1.querySelector(".drop-zone__prompt").style.display = "block";
            Slider1.style.border = "1px solid red";
        }
        Slider1.classList.remove("drop-zone--over");
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} Slider1
     * @param {File} file
     */
    function updateSlider1(Slider1, file) {
        let thumbnailElement = Slider1.querySelector(".drop-zone__thumb");



        if (Slider1.querySelector('#card-image')) {
            Slider1.querySelector('#card-image').style.display = "none";
        }

        if (Slider1.querySelector('#card-uploadFile')) {
            Slider1.querySelector('#card-uploadFile').style.display = "none";
        }

        // First time - remove the prompt
        if (file.type == 'image/png') {
            if (Slider1.querySelector(".drop-zone__prompt")) {
                Slider1.querySelector(".drop-zone__prompt").style.display = "none";
            }
        } else {
            if (Slider1.querySelector(".drop-zone__prompt")) {
                Slider1.querySelector(".drop-zone__prompt").style.display = "block";
            }
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            thumbnailElement.style.width = "98%";
            thumbnailElement.style.height = "139px";
            thumbnailElement.style.backgroundSize = "cover"
            Slider1.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files

        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
        const Slider1Result = true;
    }

    const Slider2__input = document.querySelector('#Slider2');
    const Slider2 = Slider2__input.closest(".drop-zone");

    Slider2.addEventListener("click", (e) => {
        Slider2__input.click();
    });

    Slider2__input.addEventListener("change", (e) => {
        if (Slider2__input.files[0].type == 'image/png') {
            Slider2.style.border = "1px solid var(--primary)";
            if (Slider2__input.files.length) {
                Slider2.style.padding = "3px";
                updateSlider2(Slider2, Slider2__input.files[0]);
            }
        } else {
            Slider2.style.padding = "25px";
            Slider2.querySelector(".drop-zone__prompt").style.display = "block";
            Slider2.style.border = "1px solid red";
        }
    });

    Slider2.addEventListener("dragover", (e) => {
        e.preventDefault();
        Slider2.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
        Slider2.addEventListener(type, (e) => {
            Slider2.classList.remove("drop-zone--over");
        });
    });

    Slider2.addEventListener("drop", (e) => {
        e.preventDefault();
        if (e.dataTransfer.files[0].type == 'image/png') {
            Slider2.style.border = "1px solid var(--primary)";
            if (e.dataTransfer.files.length) {
                Slider2.style.padding = "3px";
                Slider2__input.files = e.dataTransfer.files;
                updateSlider2(Slider2, e.dataTransfer.files[0]);
            }
        } else {
            Slider2.querySelector(".drop-zone__prompt").style.display = "block";
            Slider2.style.border = "1px solid red";
            Slider2.style.padding = "25px";
        }
        Slider2.classList.remove("drop-zone--over");
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} Slider2
     * @param {File} file
     */
    function updateSlider2(Slider2, file) {
        let thumbnailElement = Slider2.querySelector(".drop-zone__thumb");

        if (Slider2.querySelector('#card-image')) {
            Slider2.querySelector('#card-image').style.display = "none";
        }

        if (Slider2.querySelector('#card-uploadFile')) {
            Slider2.querySelector('#card-uploadFile').style.display = "none";
        }

        // First time - remove the prompt
        if (file.type == 'image/png') {
            if (Slider2.querySelector(".drop-zone__prompt")) {
                Slider2.querySelector(".drop-zone__prompt").style.display = "none";
            }
        } else {
            if (Slider2.querySelector(".drop-zone__prompt")) {
                Slider2.querySelector(".drop-zone__prompt").style.display = "block";
            }
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            thumbnailElement.style.width = "98%";
            thumbnailElement.style.height = "139px";
            thumbnailElement.style.backgroundSize = "cover"
            Slider2.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files

        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
        const Slider2Result = true;
    }

    const Slider3__input = document.querySelector('#Slider3');
    const Slider3 = Slider3__input.closest(".drop-zone");

    Slider3.addEventListener("click", (e) => {
        Slider3__input.click();
    });

    Slider3__input.addEventListener("change", (e) => {
        if (Slider3__input.files[0].type == 'image/png') {
            Slider3.style.border = "1px solid var(--primary)";
            if (Slider3__input.files.length) {
                Slider3.style.padding = "3px";
                updateSlider3(Slider3, Slider3__input.files[0]);
            }
        } else {
            Slider3.style.padding = "25px";
            Slider3.querySelector(".drop-zone__prompt").style.display = "block";
            Slider3.style.border = "1px solid red";
        }
    });

    Slider3.addEventListener("dragover", (e) => {
        e.preventDefault();
        Slider3.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
        Slider3.addEventListener(type, (e) => {
            Slider3.classList.remove("drop-zone--over");
        });
    });

    Slider3.addEventListener("drop", (e) => {
        e.preventDefault();
        if (e.dataTransfer.files[0].type == 'image/png') {
            Slider3.style.border = "1px solid var(--primary)";
            if (e.dataTransfer.files.length) {
                Slider4.style.padding = "3px";
                Slider3__input.files = e.dataTransfer.files;
                updateSlider3(Slider3, e.dataTransfer.files[0]);
            } else {
                Slider4.style.padding = "25px";
                Slider3.querySelector(".drop-zone__prompt").style.display = "block";
                Slider3.style.border = "1px solid red";
            }
        }

        Slider3.classList.remove("drop-zone--over");
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} Slider3
     * @param {File} file
     */
    function updateSlider3(Slider3, file) {
        let thumbnailElement = Slider3.querySelector(".drop-zone__thumb");

        if (Slider3.querySelector('#card-image')) {
            Slider3.querySelector('#card-image').style.display = "none";
        }

        if (Slider3.querySelector('#card-uploadFile')) {
            Slider3.querySelector('#card-uploadFile').style.display = "none";
        }

        // First time - remove the prompt
        if (file.type == 'image/png') {
            if (Slider3.querySelector(".drop-zone__prompt")) {
                Slider3.querySelector(".drop-zone__prompt").style.display = "none";
            }
        } else {
            if (Slider3.querySelector(".drop-zone__prompt")) {
                Slider3.querySelector(".drop-zone__prompt").style.display = "block";
            }
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            thumbnailElement.style.width = "98%";
            thumbnailElement.style.height = "139px";
            thumbnailElement.style.backgroundSize = "cover"
            Slider3.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
        const Slider3Result = true;
    }

    const Slider4__input = document.querySelector('#Slider4');
    const Slider4 = Slider4__input.closest(".drop-zone");

    Slider4.addEventListener("click", (e) => {
        Slider4__input.click();
    });

    Slider4__input.addEventListener("change", (e) => {
        if (Slider4__input.files[0].type == 'image/png') {
            Slider4.style.border = "1px solid var(--primary)";
            if (Slider4__input.files.length) {
                Slider4.style.padding = "3px";
                updateSlider4(Slider4, Slider4__input.files[0]);
            }
        } else {
            Slider4.style.padding = "25px";
            Slider4.querySelector(".drop-zone__prompt").style.display = "block";
            Slider4.style.border = "1px solid red";
        }
    });

    Slider4.addEventListener("dragover", (e) => {
        e.preventDefault();
        Slider4.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
        Slider4.addEventListener(type, (e) => {
            Slider4.classList.remove("drop-zone--over");
        });
    });

    Slider4.addEventListener("drop", (e) => {
        e.preventDefault();
        if (e.dataTransfer.files[0].type == 'image/png') {
            Slider4.style.border = "1px solid var(--primary)";
            if (e.dataTransfer.files.length) {
                Slider4.style.padding = "3px";
                Slider4__input.files = e.dataTransfer.files;
                updateSlider4(Slider4, e.dataTransfer.files[0]);
            }
        } else {
            Slider4.style.padding = "25px";
            Slider4.querySelector(".drop-zone__prompt").style.display = "block";
            Slider4.style.border = "1px solid red";
        }

        Slider4.classList.remove("drop-zone--over");
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} Slider4
     * @param {File} file
     */
    function updateSlider4(Slider4, file) {
        let thumbnailElement = Slider4.querySelector(".drop-zone__thumb");

        if (Slider4.querySelector('#card-image')) {
            Slider4.querySelector('#card-image').style.display = "none";
        }

        if (Slider4.querySelector('#card-uploadFile')) {
            Slider4.querySelector('#card-uploadFile').style.display = "none";
        }

        // First time - remove the prompt
        if (file.type == 'image/png') {
            if (Slider4.querySelector(".drop-zone__prompt")) {
                Slider4.querySelector(".drop-zone__prompt").style.display = "none";
            }
        } else {
            if (Slider4.querySelector(".drop-zone__prompt")) {
                Slider4.querySelector(".drop-zone__prompt").style.display = "block";
            }
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            thumbnailElement.style.width = "98%";
            thumbnailElement.style.height = "139px";
            thumbnailElement.style.backgroundSize = "cover"
            Slider4.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
        const Slider4Result = true;
    }

    $('#AddProduct').hide();

    const ul = document.querySelector("#listtags"),
        input = document.querySelector("#addtags"),
        gettags = document.querySelector('#tags');

    let maxTags = 100,
        tags = [];

    createTag();

    function createTag() {
        ul.querySelectorAll("li").forEach(li => li.remove());
        tags.slice().reverse().forEach(tag => {
            let liTag = `
            <li class="select2-selection__choice" title="Mozilla" data-select2-id="17"><span class="select2-selection__choice__remove" onclick="remove(this, '${tag}')" role="presentation">×</span>${tag}</li>`;
            ul.insertAdjacentHTML("afterbegin", liTag);
        });
    }

    function remove(element, tag) {
        let index = tags.indexOf(tag);
        tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
        element.parentElement.remove();
    }

    function addTag(e) {
        if (e.key == "Enter") {
            let tag = e.target.value.replace(/\s+/g, ' ');
            if (tag.length > 1 && !tags.includes(tag)) {
                if (tags.length < maxTags) {
                    tag.split(',').forEach(tag => {
                        tags.push(tag);
                        gettags.value = [tags];
                        document.querySelector('#pht').style.display = "none"
                        createTag();
                    });
                }
            }
            e.target.value = "";
        }
    }

    input.addEventListener("keyup", addTag);

    $('#ProductPrice').change(function() {

        if (isNumeric($('#ProductPrice').val())) {
            if ($('#ProductPrice').val() == 0 || $('#ProductPrice').val() > 999) {
                $('#ProductPrice').css('border', '1px solid red');
                $('#validate_data').attr('disabled', 'disabled');
                $('#validate_data').removeAttr(`name`)
            } else {
                $('#ProductPrice').css('border', '1px solid #6e4ff6');
                $('#validate_data').removeAttr(`disabled`);
                $('#validate_data').attr('name', 'validate_data');
            }
        } else {
            $('#ProductPrice').css('border', '1px solid red');
            $('#validate_data').attr('disabled', 'disabled');
            $('#validate_data').removeAttr(`name`)
        }
    });


    function check_description() {
        if ($('#description').val().length > 10) {
            $('#unicp').css('color:', 'red');
            $('#unicp').text('Maximum number of characters is 20000');
        }
    }

    function checkCategoyes() {
        if (document.getElementById('category').value == '') {
            document.getElementById('categoryProductsBtn').disabled = true;
        } else {
            document.getElementById('categoryProductsBtn').disabled = false;
        }
    }
    document.getElementById('categoryProductsBtn').disabled = true;

    const opt2 = document.querySelector('#opt2');
    const Gfont = document.querySelector('#Gfont');

    opt2.addEventListener('click', () => {
        if (opt2.checked == true) {
            Gfont.style.fontWeight = "bold"
        } else {
            Gfont.style.fontWeight = "initial"
            opt2.checked = false
        }
    });
</script>

</html>