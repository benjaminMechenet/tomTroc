<?php

class Utils
{
    /**
     * @param DateTime $date 
     * @return string
     */
    public static function convertDateToFrenchFormat(DateTime $date): string
    {
        $dateFormatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $dateFormatter->setPattern('EEEE d MMMM Y');
        return $dateFormatter->format($date);
    }

    /**
     * @param string $action
     * @param array $params
     * @return void
     */
    public static function redirect(string $action, array $params = []): void
    {
        $url = "index.php?action=$action";
        foreach ($params as $paramName => $paramValue) {
            $url .= "&$paramName=$paramValue";
        }
        header("Location: $url");
        exit();
    }

    /**
     * @param string $message
     * @return string
     */
    public static function askConfirmation(string $message): string
    {
        return "onclick=\"return confirm('$message');\"";
    }

    /**
     * @param string $string
     * @return string
     */
    public static function format(string $string): string
    {
        $finalString = htmlspecialchars($string, ENT_QUOTES);

        $lines = explode("\n", $finalString);

        $finalString = "";
        foreach ($lines as $line) {
            if (trim($line) != "") {
                $finalString .= "<p>$line</p>";
            }
        }

        return $finalString;
    }

    /**
     * @param string $variableName
     * @param mixed $defaultValue
     * @return mixed
     */
    public static function request(string $variableName, mixed $defaultValue = null): mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }

    /**
     * @param string $filePath
     * @param int $finalSize
     */
    public static function resizeImageToWebp($filePath, $finalSize = 100): string
    {
        list($origWidth, $origHeight, $imageType) = getimagesize($filePath);

        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $src = imagecreatefromjpeg($filePath);
                break;
            case IMAGETYPE_PNG:
                $src = imagecreatefrompng($filePath);
                break;
            case IMAGETYPE_GIF:
                $src = imagecreatefromgif($filePath);
                break;
            case IMAGETYPE_WEBP:
                $src = imagecreatefromwebp($filePath);
                break;
            default:
                return '';
        }

        if (!$src) return '';

        if ($origHeight > $origWidth) {
            $newWidth = $finalSize;
            $newHeight = intval($origHeight * ($finalSize / $origWidth));
        } else {
            $newHeight = $finalSize;
            $newWidth = intval($origWidth * ($finalSize / $origHeight));
        }

        $resized = imagecreatetruecolor($newWidth, $newHeight);
        imagealphablending($resized, false);
        imagesavealpha($resized, true);
        $transparent = imagecolorallocatealpha($resized, 0, 0, 0, 127);
        imagefilledrectangle($resized, 0, 0, $newWidth, $newHeight, $transparent);
        imagecopyresampled($resized, $src, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

        $dst = imagecreatetruecolor($finalSize, $finalSize);
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
        $transparent = imagecolorallocatealpha($dst, 0, 0, 0, 127);
        imagefilledrectangle($dst, 0, 0, $finalSize, $finalSize, $transparent);

        $cropX = max(0, intval(($newWidth - $finalSize) / 2));
        $cropY = max(0, intval(($newHeight - $finalSize) / 2));

        imagecopy($dst, $resized, 0, 0, $cropX, $cropY, $finalSize, $finalSize);

        $newFilePath = preg_replace('/\.(jpe?g|png|gif|webp)$/i', '.webp', $filePath);
        imagewebp($dst, $newFilePath, 90);

        imagedestroy($src);
        imagedestroy($resized);
        imagedestroy($dst);

        return basename($newFilePath);
    }
}
