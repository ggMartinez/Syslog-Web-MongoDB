<?php 
    namespace App\Services;

    class FormatService
    {

       
        public function FormatSeverity($value){
            switch($value)
            {
                case "0": { 
                    return [
                        "Text" => "Emergency",
                        "BootstrapClass" => "danger"
                    ];
                    break; 
                }
                case "1": { 
                    return [
                        "Text" => "Alert",
                        "BootstrapClass" => "danger"
                    ];
                    break; 
                }
                case "2": { 
                    return [
                        "Text" => "Critical",
                        "BootstrapClass" => "danger"
                    ];
                    break; 
                }
                case "3": { 
                    return [
                        "Text" => "Error",
                        "BootstrapClass" => "danger"
                    ];
                    break; 
                }
                case "4": { 
                    return [
                        "Text" => "Warning",
                        "BootstrapClass" => "warning"
                    ];
                    break; 
                }
                case "5": { 
                    return [
                        "Text" => "Notice",
                        "BootstrapClass" => "info"
                    ];
                    break; 
                }
                case "6": { 
                    return [
                        "Text" => "Info",
                        "BootstrapClass" => "secondary"
                    ];
                    break; 
                }
                case "7": { 
                    return [
                        "Text" => "Debug",
                        "BootstrapClass" => "primary"
                    ];
                    break; 
                }
                default: {
                    return [
                        "Text" => $value,
                        "BootstrapClass" => "info"
                    ];
                    break;
                }

            }
        }
        public function FormatFacility($value){
            switch($value)
            {
                case "0": { return "KERNEL-MESSAGE"; break; }
                case "1": { return "USER-MESSAGE"; break; }
                case "2": { return "MAIL-SYSTEM"; break; }
                case "3": { return "SECURITY-DAEMON"; break; }
                case "4": { return "AUTH-MESSAGE"; break; }
                case "5": { return "SYSLOGD"; break; }
                case "6": { return "PRINTER"; break; }
                case "7": { return "NETWORK"; break; }
                case "8": { return "UUCP"; break; }
                case "9": { return "CRON"; break; }
                case "10": { return "AUTH-MESSAGE-10"; break; }
                case "11": { return "FTP"; break; }
                case "12": { return "NTP"; break; }
                case "13": { return "LOG-AUDIT"; break; }
                case "14": { return "LOG-ALERT"; break; }
                case "15": { return "CLOCK-DAEMON"; break; }
                case "16": { return "LOCAL0"; break; }
                case "17": { return "LOCAL1"; break; }
                case "18": { return "LOCAL2"; break; }
                case "19": { return "LOCAL3"; break; }
                case "20": { return "LOCAL4"; break; }
                case "21": { return "LOCAL5"; break; }
                case "22": { return "LOCAL6"; break; }
                case "23": { return "LOCAL7"; break; }
            }
        }
    }