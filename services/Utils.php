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
}
