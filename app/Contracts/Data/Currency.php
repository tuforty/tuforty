<?php

namespace App\Contracts\Data;

class Currency
{
    const directory = [
        "RUB" => [
            "currency_short" => "ruble",
            "currency" => "Russian ruble",
            "symbol" => "₽",
            "fractional_unit" => "kopek",
            "number_to_basic" => "100",
            "countries" => [
                "Abkhazia",
                "Russia",
                "South Ossetia",
                "Ukraine"
            ]
        ],
        "EUR" => [
            "currency_short" => "euro",
            "currency" => "Euro",
            "symbol" => "€",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => [
                "Akrotiri and Dhekelia",
                "Andorra",
                "Austria",
                "Belgium",
                "Cyprus",
                "Estonia",
                "Finland",
                "France",
                "Germany",
                "Greece",
                "Ireland",
                "Italy",
                "Kosovo",
                "Latvia",
                "Lithuania",
                "Luxembourg",
                "Malta",
                "Monaco",
                "Montenegro",
                "Netherlands",
                "Portugal",
                "San Marino",
                "Slovakia",
                "Slovenia",
                "Spain",
                "Vatican City"
            ]
        ],
        "GBP" => [
            "currency_short" => "pound",
            "currency" => "British pound",
            "symbol" => "£",
            "fractional_unit" => "penny",
            "number_to_basic" => "100",
            "countries" => [
                "Alderney",
                "Guernsey",
                "Isle of Man",
                "Jersey",
                "United Kingdom"
            ]
        ],
        "GGP" => [
            "currency_short" => "pound",
            "currency" => "Guernsey pound",
            "symbol" => "£",
            "fractional_unit" => "penny",
            "number_to_basic" => "100",
            "countries" => [
                "Alderney",
                "Guernsey"
            ]
        ],
        "DZD" => [
            "currency_short" => "dinar",
            "currency" => "Algerian dinar",
            "symbol" => "د.ج",
            "fractional_unit" => "santeem",
            "number_to_basic" => "100",
            "countries" => [
                "Algeria",
                "Sahrawi Republic"
            ]
        ],
        "XCD" => [
            "currency_short" => "dollar",
            "currency" => "Eastern Caribbean dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => [
                "Anguilla",
                "Antigua and Barbuda",
                "Dominica",
                "Grenada",
                "Montserrat",
                "Saint Kitts and Nevis",
                "Saint Lucia",
                "Saint Vincent and the Grenadines"
            ]
        ],
        "AMD" => [
            "currency_short" => "dram",
            "currency" => "Armenian dram",
            "symbol" => "֏",
            "fractional_unit" => "luma",
            "number_to_basic" => "100",
            "countries" => [
                "Armenia",
                "Artsakh"
            ]
        ],
        "SHP" => [
            "currency_short" => "pound",
            "currency" => "Saint Helena pound",
            "symbol" => "£",
            "fractional_unit" => "penny",
            "number_to_basic" => "100",
            "countries" => [
                "United Kingdom Ascension Island",
                "Saint Helena"
            ]
        ],
        "XOF" => [
            "currency_short" => "franc",
            "currency" => "West African CFA franc",
            "symbol" => "Fr",
            "fractional_unit" => "centime",
            "number_to_basic" => "100",
            "countries" => [
                "Benin",
                "Burkina Faso",
                "Côte d'Ivoire",
                "Guinea-Bissau",
                "Mali",
                "Niger",
                "Senegal",
                "Togo"
            ]
        ],
        "AUD" => [
            "currency_short" => "dollar",
            "currency" => "Australian dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => [
                "Australia",
                "Kiribati",
                "Nauru",
                "Tuvalu"
            ]
        ],
        "INR" => [
            "currency_short" => "rupee",
            "currency" => "Indian rupee",
            "symbol" => "₹",
            "fractional_unit" => "paisa",
            "number_to_basic" => "100",
            "countries" => [
                "Bhutan",
                "India"
            ]
        ],
        "USD" => [
            "currency_short" => "dollar",
            "currency" => "United States dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => [
                "Bonaire",
                "British Indian Ocean Territory",
                "British Virgin Islands",
                "East Timor",
                "Ecuador",
                "El Salvador",
                "Marshall Islands",
                "Micronesia",
                "Palau",
                "Panama",
                "Saba",
                "Sint Eustatius",
                "Turks and Caicos Islands",
                "United States"
            ]
        ],
        "BND" => [
            "currency_short" => "dollar",
            "currency" => "Brunei dollar",
            "symbol" => "$",
            "fractional_unit" => "sen",
            "number_to_basic" => "100",
            "countries" => [
                "Brunei",
                "Singapore"
            ]
        ],
        "SGD" => [
            "currency_short" => "dollar",
            "currency" => "Singapore dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => [
                "Brunei",
                "Singapore"
            ]
        ],
        "XAF" => [
            "currency_short" => "franc",
            "currency" => "Central African CFA franc",
            "symbol" => "Fr",
            "fractional_unit" => "centime",
            "number_to_basic" => "100",
            "countries" => [
                "Cameroon",
                "Central African Republic",
                "Chad",
                "Congo, Republic of the",
                "Equatorial Guinea",
                "Gabon"
            ]
        ],
        "NZD" => [
            "currency_short" => "dollar",
            "currency" => "New Zealand dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => [
                "Cook Islands",
                "New Zealand",
                "Niue",
                "Pitcairn Islands"
            ]
        ],
        "ANG" => [
            "currency_short" => "guilder",
            "currency" => "Netherlands Antillean guilder",
            "symbol" => "ƒ",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => [
                "Curaçao",
                "Sint Maarten"
            ]
        ],
        "DKK" => [
            "currency_short" => "krone",
            "currency" => "Danish krone",
            "symbol" => "kr",
            "fractional_unit" => "øre",
            "number_to_basic" => "100",
            "countries" => [
                "Denmark",
                "Faroe Islands"
            ]
        ],
        "ZAR" => [
            "currency_short" => "rand",
            "currency" => "South African rand",
            "symbol" => "R",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => [
                "Eswatini",
                "Lesotho",
                "Namibia",
                "South Africa"
            ]
        ],
        "XPF" => [
            "currency_short" => "franc",
            "currency" => "CFP franc",
            "symbol" => "₣",
            "fractional_unit" => "centime",
            "number_to_basic" => "100",
            "countries" => [
                "French Polynesia",
                "New Caledonia",
                "Wallis and Futuna"
            ]
        ],
        "ILS" => [
            "currency_short" => "shekel",
            "currency" => "Israeli new shekel",
            "symbol" => "₪",
            "fractional_unit" => "agora",
            "number_to_basic" => "100",
            "countries" => [
                "Israel",
                "Palestine"
            ]
        ],
        "JOD" => [
            "currency_short" => "dinar",
            "currency" => "Jordanian dinar",
            "symbol" => "د.ا",
            "fractional_unit" => "piastre",
            "number_to_basic" => "100",
            "countries" => [
                "Jordan",
                "Palestine"
            ]
        ],
        "MRU" => [
            "currency_short" => "ouguiya",
            "currency" => "Mauritanian ouguiya",
            "symbol" => "UM",
            "fractional_unit" => "khoums",
            "number_to_basic" => "5",
            "countries" => [
                "Mauritania",
                "Sahrawi Republic"
            ]
        ],
        "CHF" => [
            "currency_short" => "franc",
            "currency" => "Swiss franc",
            "symbol" => "Fr.",
            "fractional_unit" => "rappen",
            "number_to_basic" => "100",
            "countries" => [
                "Liechtenstein",
                "Switzerland"
            ]
        ],
        "MAD" => [
            "currency_short" => "dirham",
            "currency" => "Moroccan dirham",
            "symbol" => "د.م.",
            "fractional_unit" => "centime",
            "number_to_basic" => "100",
            "countries" => [
                "Morocco",
                "Sahrawi Republic"
            ]
        ],
        "TRY" => [
            "currency_short" => "lira",
            "currency" => "Turkish lira",
            "symbol" => "₺",
            "fractional_unit" => "kuruş",
            "number_to_basic" => "100",
            "countries" => [
                "Northern Cyprus",
                "Turkey"
            ]
        ],
        "AFN" => [
            "currency_short" => "afghani",
            "currency" => "Afghan afghani",
            "symbol" => "؋",
            "fractional_unit" => "pul",
            "number_to_basic" => "100",
            "countries" => ["Afghanistan"]
        ],
        "ALL" => [
            "currency_short" => "lek",
            "currency" => "Albanian lek",
            "symbol" => "L",
            "fractional_unit" => "qindarkë",
            "number_to_basic" => "100",
            "countries" => ["Albania"]
        ],
        "AOA" => [
            "currency_short" => "kwanza",
            "currency" => "Angolan kwanza",
            "symbol" => "Kz",
            "fractional_unit" => "cêntimo",
            "number_to_basic" => "100",
            "countries" => ["Angola"]
        ],
        "ARS" => [
            "currency_short" => "peso",
            "currency" => "Argentine peso",
            "symbol" => "$",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Argentina"]
        ],
        "AWG" => [
            "currency_short" => "florin",
            "currency" => "Aruban florin",
            "symbol" => "ƒ",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Aruba"]
        ],
        "AZN" => [
            "currency_short" => "manat",
            "currency" => "Azerbaijani manat",
            "symbol" => "₼",
            "fractional_unit" => "qəpik",
            "number_to_basic" => "100",
            "countries" => ["Azerbaijan"]
        ],
        "BSD" => [
            "currency_short" => "dollar",
            "currency" => "Bahamian dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Bahamas, The"]
        ],
        "BHD" => [
            "currency_short" => "dinar",
            "currency" => "Bahraini dinar",
            "symbol" => ".د.ب",
            "fractional_unit" => "fils",
            "number_to_basic" => "1000",
            "countries" => ["Bahrain"]
        ],
        "BDT" => [
            "currency_short" => "taka",
            "currency" => "Bangladeshi taka",
            "symbol" => "৳",
            "fractional_unit" => "poisha",
            "number_to_basic" => "100",
            "countries" => ["Bangladesh"]
        ],
        "BBD" => [
            "currency_short" => "dollar",
            "currency" => "Barbadian dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Barbados"]
        ],
        "BYN" => [
            "currency_short" => "ruble",
            "currency" => "Belarusian ruble",
            "symbol" => "Br",
            "fractional_unit" => "kapyeyka",
            "number_to_basic" => "100",
            "countries" => ["Belarus"]
        ],
        "BZD" => [
            "currency_short" => "dollar",
            "currency" => "Belize dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Belize"]
        ],
        "BMD" => [
            "currency_short" => "dollar",
            "currency" => "Bermudian dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Bermuda"]
        ],
        "BTN" => [
            "currency_short" => "ngultrum",
            "currency" => "Bhutanese ngultrum",
            "symbol" => "Nu.",
            "fractional_unit" => "chetrum",
            "number_to_basic" => "100",
            "countries" => ["Bhutan"]
        ],
        "BOB" => [
            "currency_short" => "boliviano",
            "currency" => "Bolivian boliviano",
            "symbol" => "Bs.",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Bolivia"]
        ],
        "BWP" => [
            "currency_short" => "pula",
            "currency" => "Botswana pula",
            "symbol" => "P",
            "fractional_unit" => "thebe",
            "number_to_basic" => "100",
            "countries" => ["Botswana"]
        ],
        "BRL" => [
            "currency_short" => "real",
            "currency" => "Brazilian real",
            "symbol" => "R$",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Brazil"]
        ],
        "BGN" => [
            "currency_short" => "lev",
            "currency" => "Bulgarian lev",
            "symbol" => "лв.",
            "fractional_unit" => "stotinka",
            "number_to_basic" => "100",
            "countries" => ["Bulgaria"]
        ],
        "BIF" => [
            "currency_short" => "franc",
            "currency" => "Burundian franc",
            "symbol" => "Fr",
            "fractional_unit" => "centime",
            "number_to_basic" => "100",
            "countries" => ["Burundi"]
        ],
        "KHR" => [
            "currency_short" => "riel",
            "currency" => "Cambodian riel",
            "symbol" => "៛",
            "fractional_unit" => "sen",
            "number_to_basic" => "100",
            "countries" => ["Cambodia"]
        ],
        "CAD" => [
            "currency_short" => "dollar",
            "currency" => "Canadian dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Canada"]
        ],
        "CVE" => [
            "currency_short" => "escudo",
            "currency" => "Cape Verdean escudo",
            "symbol" => "Esc or $",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Cape Verde"]
        ],
        "KYD" => [
            "currency_short" => "dollar",
            "currency" => "Cayman Islands dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Cayman Islands"]
        ],
        "CLP" => [
            "currency_short" => "peso",
            "currency" => "Chilean peso",
            "symbol" => "$",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Chile"]
        ],
        "CNY" => [
            "currency_short" => "yuan",
            "currency" => "Chinese yuan",
            "symbol" => "¥ or 元",
            "fractional_unit" => "jiao",
            "number_to_basic" => "10",
            "countries" => ["China"]
        ],
        "COP" => [
            "currency_short" => "peso",
            "currency" => "Colombian peso",
            "symbol" => "$",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Colombia"]
        ],
        "KMF" => [
            "currency_short" => "franc",
            "currency" => "Comorian franc",
            "symbol" => "Fr",
            "fractional_unit" => "centime",
            "number_to_basic" => "100",
            "countries" => ["Comoros"]
        ],
        "CDF" => [
            "currency_short" => "franc",
            "currency" => "Congolese franc",
            "symbol" => "Fr",
            "fractional_unit" => "centime",
            "number_to_basic" => "100",
            "countries" => ["Congo"]
        ],
        "CKD" => [
            "currency_short" => "dollar",
            "currency" => "Cook Islands dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Cook Islands"]
        ],
        "CRC" => [
            "currency_short" => "colón",
            "currency" => "Costa Rican colón",
            "symbol" => "₡",
            "fractional_unit" => "céntimo",
            "number_to_basic" => "100",
            "countries" => ["Costa Rica"]
        ],
        "HRK" => [
            "currency_short" => "kuna",
            "currency" => "Croatian kuna",
            "symbol" => "kn",
            "fractional_unit" => "lipa",
            "number_to_basic" => "100",
            "countries" => ["Croatia"]
        ],
        "CUP" => [
            "currency_short" => "peso",
            "currency" => "Cuban peso",
            "symbol" => "$",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Cuba"]
        ],
        "CZK" => [
            "currency_short" => "koruna",
            "currency" => "Czech koruna",
            "symbol" => "Kč",
            "fractional_unit" => "haléř",
            "number_to_basic" => "100",
            "countries" => ["Czech Republic"]
        ],
        "DJF" => [
            "currency_short" => "franc",
            "currency" => "Djiboutian franc",
            "symbol" => "Fr",
            "fractional_unit" => "centime",
            "number_to_basic" => "100",
            "countries" => ["Djibouti"]
        ],
        "DOP" => [
            "currency_short" => "peso",
            "currency" => "Dominican peso",
            "symbol" => "$",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Dominican Republic"]
        ],
        "EGP" => [
            "currency_short" => "pound",
            "currency" => "Egyptian pound",
            "symbol" => "£ or ج.م",
            "fractional_unit" => "piastre",
            "number_to_basic" => "100",
            "countries" => ["Egypt"]
        ],
        "ERN" => [
            "currency_short" => "nakfa",
            "currency" => "Eritrean nakfa",
            "symbol" => "Nfk",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Eritrea"]
        ],
        "SZL" => [
            "currency_short" => "lilangeni",
            "currency" => "Swazi lilangeni",
            "symbol" => "L",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Eswatini"]
        ],
        "ETB" => [
            "currency_short" => "birr",
            "currency" => "Ethiopian birr",
            "symbol" => "Br",
            "fractional_unit" => "santim",
            "number_to_basic" => "100",
            "countries" => ["Ethiopia"]
        ],
        "FKP" => [
            "currency_short" => "pound",
            "currency" => "Falkland Islands pound",
            "symbol" => "£",
            "fractional_unit" => "penny",
            "number_to_basic" => "100",
            "countries" => ["Falkland Islands"]
        ],
        "FOK" => [
            "currency_short" => "króna",
            "currency" => "Faroese króna",
            "symbol" => "kr",
            "fractional_unit" => "oyra",
            "number_to_basic" => "100",
            "countries" => ["Faroe Islands"]
        ],
        "FJD" => [
            "currency_short" => "dollar",
            "currency" => "Fijian dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Fiji"]
        ],
        "GMD" => [
            "currency_short" => "dalasi",
            "currency" => "Gambian dalasi",
            "symbol" => "D",
            "fractional_unit" => "butut",
            "number_to_basic" => "100",
            "countries" => ["Gambia, The"]
        ],
        "GEL" => [
            "currency_short" => "lari",
            "currency" => "Georgian lari",
            "symbol" => "₾",
            "fractional_unit" => "tetri",
            "number_to_basic" => "100",
            "countries" => ["Georgia"]
        ],
        "GHS" => [
            "currency_short" => "cedi",
            "currency" => "Ghanaian cedi",
            "symbol" => "₵",
            "fractional_unit" => "pesewa",
            "number_to_basic" => "100",
            "countries" => ["Ghana"]
        ],
        "GIP" => [
            "currency_short" => "pound",
            "currency" => "Gibraltar pound",
            "symbol" => "£",
            "fractional_unit" => "penny",
            "number_to_basic" => "100",
            "countries" => ["Gibraltar"]
        ],
        "GTQ" => [
            "currency_short" => "quetzal",
            "currency" => "Guatemalan quetzal",
            "symbol" => "Q",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Guatemala"]
        ],
        "GNF" => [
            "currency_short" => "franc",
            "currency" => "Guinean franc",
            "symbol" => "Fr",
            "fractional_unit" => "centime",
            "number_to_basic" => "100",
            "countries" => ["Guinea"]
        ],
        "GYD" => [
            "currency_short" => "dollar",
            "currency" => "Guyanese dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Guyana"]
        ],
        "HTG" => [
            "currency_short" => "gourde",
            "currency" => "Haitian gourde",
            "symbol" => "G",
            "fractional_unit" => "centime",
            "number_to_basic" => "100",
            "countries" => ["Haiti"]
        ],
        "HNL" => [
            "currency_short" => "lempira",
            "currency" => "Honduran lempira",
            "symbol" => "L",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Honduras"]
        ],
        "HKD" => [
            "currency_short" => "dollar",
            "currency" => "Hong Kong dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Hong Kong"]
        ],
        "HUF" => [
            "currency_short" => "forint",
            "currency" => "Hungarian forint",
            "symbol" => "Ft",
            "fractional_unit" => "fillér",
            "number_to_basic" => "100",
            "countries" => ["Hungary"]
        ],
        "ISK" => [
            "currency_short" => "króna",
            "currency" => "Icelandic króna",
            "symbol" => "kr",
            "fractional_unit" => "eyrir",
            "number_to_basic" => "100",
            "countries" => ["Iceland"]
        ],
        "IDR" => [
            "currency_short" => "rupiah",
            "currency" => "Indonesian rupiah",
            "symbol" => "Rp",
            "fractional_unit" => "sen",
            "number_to_basic" => "100",
            "countries" => ["Indonesia"]
        ],
        "IRR" => [
            "currency_short" => "rial",
            "currency" => "Iranian rial",
            "symbol" => "﷼",
            "fractional_unit" => "dinar",
            "number_to_basic" => "100",
            "countries" => ["Iran"]
        ],
        "IQD" => [
            "currency_short" => "dinar",
            "currency" => "Iraqi dinar",
            "symbol" => "ع.د",
            "fractional_unit" => "fils",
            "number_to_basic" => "1000",
            "countries" => ["Iraq"]
        ],
        "IMP" => [
            "currency_short" => "pound",
            "currency" => "Manx pound",
            "symbol" => "£",
            "fractional_unit" => "penny",
            "number_to_basic" => "100",
            "countries" => ["Isle of Man"]
        ],
        "JMD" => [
            "currency_short" => "dollar",
            "currency" => "Jamaican dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Jamaica"]
        ],
        "JPY" => [
            "currency_short" => "yen",
            "currency" => "Japanese yen",
            "symbol" => "¥ or 円",
            "fractional_unit" => "sen",
            "number_to_basic" => "100",
            "countries" => ["Japan"]
        ],
        "JEP" => [
            "currency_short" => "pound",
            "currency" => "Jersey pound",
            "symbol" => "£",
            "fractional_unit" => "penny",
            "number_to_basic" => "100",
            "countries" => ["Jersey"]
        ],
        "KZT" => [
            "currency_short" => "tenge",
            "currency" => "Kazakhstani tenge",
            "symbol" => "₸",
            "fractional_unit" => "tıyn",
            "number_to_basic" => "100",
            "countries" => ["Kazakhstan"]
        ],
        "KES" => [
            "currency_short" => "shilling",
            "currency" => "Kenyan shilling",
            "symbol" => "Sh",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Kenya"]
        ],
        "KID" => [
            "currency_short" => "dollar",
            "currency" => "Kiribati dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Kiribati"]
        ],
        "KPW" => [
            "currency_short" => "won",
            "currency" => "North Korean won",
            "symbol" => "₩",
            "fractional_unit" => "chon",
            "number_to_basic" => "100",
            "countries" => ["Korea, North"]
        ],
        "KRW" => [
            "currency_short" => "won",
            "currency" => "South Korean won",
            "symbol" => "₩",
            "fractional_unit" => "jeon",
            "number_to_basic" => "100",
            "countries" => ["Korea, South"]
        ],
        "KWD" => [
            "currency_short" => "dinar",
            "currency" => "Kuwaiti dinar",
            "symbol" => "د.ك",
            "fractional_unit" => "fils",
            "number_to_basic" => "1000",
            "countries" => ["Kuwait"]
        ],
        "KGS" => [
            "currency_short" => "som",
            "currency" => "Kyrgyzstani som",
            "symbol" => "с",
            "fractional_unit" => "tyiyn",
            "number_to_basic" => "100",
            "countries" => ["Kyrgyzstan"]
        ],
        "LAK" => [
            "currency_short" => "kip",
            "currency" => "Lao kip",
            "symbol" => "₭",
            "fractional_unit" => "att",
            "number_to_basic" => "100",
            "countries" => ["Laos"]
        ],
        "LBP" => [
            "currency_short" => "pound",
            "currency" => "Lebanese pound",
            "symbol" => "ل.ل",
            "fractional_unit" => "piastre",
            "number_to_basic" => "100",
            "countries" => ["Lebanon"]
        ],
        "LSL" => [
            "currency_short" => "loti",
            "currency" => "Lesotho loti",
            "symbol" => "L",
            "fractional_unit" => "sente",
            "number_to_basic" => "100",
            "countries" => ["Lesotho"]
        ],
        "LRD" => [
            "currency_short" => "dollar",
            "currency" => "Liberian dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Liberia"]
        ],
        "LYD" => [
            "currency_short" => "dinar",
            "currency" => "Libyan dinar",
            "symbol" => "ل.د",
            "fractional_unit" => "dirham",
            "number_to_basic" => "1000",
            "countries" => ["Libya"]
        ],
        "MOP" => [
            "currency_short" => "pataca",
            "currency" => "Macanese pataca",
            "symbol" => "P",
            "fractional_unit" => "avo",
            "number_to_basic" => "100",
            "countries" => ["Macau"]
        ],
        "MGA" => [
            "currency_short" => "ariary",
            "currency" => "Malagasy ariary",
            "symbol" => "Ar",
            "fractional_unit" => "iraimbilanja",
            "number_to_basic" => "5",
            "countries" => ["Madagascar"]
        ],
        "MWK" => [
            "currency_short" => "kwacha",
            "currency" => "Malawian kwacha",
            "symbol" => "MK",
            "fractional_unit" => "tambala",
            "number_to_basic" => "100",
            "countries" => ["Malawi"]
        ],
        "MYR" => [
            "currency_short" => "ringgit",
            "currency" => "Malaysian ringgit",
            "symbol" => "RM",
            "fractional_unit" => "sen",
            "number_to_basic" => "100",
            "countries" => ["Malaysia"]
        ],
        "MVR" => [
            "currency_short" => "rufiyaa",
            "currency" => "Maldivian rufiyaa",
            "symbol" => ".ރ",
            "fractional_unit" => "laari",
            "number_to_basic" => "100",
            "countries" => ["Maldives"]
        ],
        "MUR" => [
            "currency_short" => "rupee",
            "currency" => "Mauritian rupee",
            "symbol" => "₨",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Mauritius"]
        ],
        "MXN" => [
            "currency_short" => "peso",
            "currency" => "Mexican peso",
            "symbol" => "$",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Mexico"]
        ],
        "MDL" => [
            "currency_short" => "leu",
            "currency" => "Moldovan leu",
            "symbol" => "L",
            "fractional_unit" => "ban",
            "number_to_basic" => "100",
            "countries" => ["Moldova"]
        ],
        "MNT" => [
            "currency_short" => "tögrög",
            "currency" => "Mongolian tögrög",
            "symbol" => "₮",
            "fractional_unit" => "möngö",
            "number_to_basic" => "100",
            "countries" => ["Mongolia"]
        ],
        "MZN" => [
            "currency_short" => "metical",
            "currency" => "Mozambican metical",
            "symbol" => "MT",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Mozambique"]
        ],
        "MMK" => [
            "currency_short" => "kyat",
            "currency" => "Burmese kyat",
            "symbol" => "Ks",
            "fractional_unit" => "pya",
            "number_to_basic" => "100",
            "countries" => ["Myanmar"]
        ],
        "NAD" => [
            "currency_short" => "dollar",
            "currency" => "Namibian dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Namibia"]
        ],
        "NPR" => [
            "currency_short" => "rupee",
            "currency" => "Nepalese rupee",
            "symbol" => "रू",
            "fractional_unit" => "paisa",
            "number_to_basic" => "100",
            "countries" => ["Nepal"]
        ],
        "NIO" => [
            "currency_short" => "córdoba",
            "currency" => "Nicaraguan córdoba",
            "symbol" => "C$",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Nicaragua"]
        ],
        "NGN" => [
            "currency_short" => "naira",
            "currency" => "Nigerian naira",
            "symbol" => "₦",
            "fractional_unit" => "kobo",
            "number_to_basic" => "100",
            "countries" => ["Nigeria"]
        ],
        "MKD" => [
            "currency_short" => "denar",
            "currency" => "Macedonian denar",
            "symbol" => "ден",
            "fractional_unit" => "deni",
            "number_to_basic" => "100",
            "countries" => ["North Macedonia"]
        ],
        "NOK" => [
            "currency_short" => "krone",
            "currency" => "Norwegian krone",
            "symbol" => "kr",
            "fractional_unit" => "øre",
            "number_to_basic" => "100",
            "countries" => ["Norway"]
        ],
        "OMR" => [
            "currency_short" => "rial",
            "currency" => "Omani rial",
            "symbol" => "ر.ع.",
            "fractional_unit" => "baisa",
            "number_to_basic" => "1000",
            "countries" => ["Oman"]
        ],
        "PKR" => [
            "currency_short" => "rupee",
            "currency" => "Pakistani rupee",
            "symbol" => "₨",
            "fractional_unit" => "paisa",
            "number_to_basic" => "100",
            "countries" => ["Pakistan"]
        ],
        "PAB" => [
            "currency_short" => "balboa",
            "currency" => "Panamanian balboa",
            "symbol" => "B/.",
            "fractional_unit" => "centésimo",
            "number_to_basic" => "100",
            "countries" => ["Panama"]
        ],
        "PGK" => [
            "currency_short" => "kina",
            "currency" => "Papua New Guinean kina",
            "symbol" => "K",
            "fractional_unit" => "toea",
            "number_to_basic" => "100",
            "countries" => ["Papua New Guinea"]
        ],
        "PYG" => [
            "currency_short" => "guaraní",
            "currency" => "Paraguayan guaraní",
            "symbol" => "₲",
            "fractional_unit" => "céntimo",
            "number_to_basic" => "100",
            "countries" => ["Paraguay"]
        ],
        "PEN" => [
            "currency_short" => "sol",
            "currency" => "Peruvian sol",
            "symbol" => "S/.",
            "fractional_unit" => "céntimo",
            "number_to_basic" => "100",
            "countries" => ["Peru"]
        ],
        "PHP" => [
            "currency_short" => "peso",
            "currency" => "Philippine peso",
            "symbol" => "₱",
            "fractional_unit" => "sentimo",
            "number_to_basic" => "100",
            "countries" => ["Philippines"]
        ],
        "PND" => [
            "currency_short" => "dollar",
            "currency" => "Pitcairn Islands dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Pitcairn Islands"]
        ],
        "PLN" => [
            "currency_short" => "złoty",
            "currency" => "Polish złoty",
            "symbol" => "zł",
            "fractional_unit" => "grosz",
            "number_to_basic" => "100",
            "countries" => ["Poland"]
        ],
        "QAR" => [
            "currency_short" => "riyal",
            "currency" => "Qatari riyal",
            "symbol" => "ر.ق",
            "fractional_unit" => "dirham",
            "number_to_basic" => "100",
            "countries" => ["Qatar"]
        ],
        "RON" => [
            "currency_short" => "leu",
            "currency" => "Romanian leu",
            "symbol" => "lei",
            "fractional_unit" => "ban",
            "number_to_basic" => "100",
            "countries" => ["Romania"]
        ],
        "RWF" => [
            "currency_short" => "franc",
            "currency" => "Rwandan franc",
            "symbol" => "Fr",
            "fractional_unit" => "centime",
            "number_to_basic" => "100",
            "countries" => ["Rwanda"]
        ],
        "WST" => [
            "currency_short" => "tālā",
            "currency" => "Samoan tālā",
            "symbol" => "T",
            "fractional_unit" => "sene",
            "number_to_basic" => "100",
            "countries" => ["Samoa"]
        ],
        "STN" => [
            "currency_short" => "dobra",
            "currency" => "São Tomé and Príncipe dobra",
            "symbol" => "Db",
            "fractional_unit" => "cêntimo",
            "number_to_basic" => "100",
            "countries" => ["São Tomé and Príncipe"]
        ],
        "SAR" => [
            "currency_short" => "riyal",
            "currency" => "Saudi riyal",
            "symbol" => "ر.س",
            "fractional_unit" => "halala",
            "number_to_basic" => "100",
            "countries" => ["Saudi Arabia"]
        ],
        "RSD" => [
            "currency_short" => "dinar",
            "currency" => "Serbian dinar",
            "symbol" => "дин. or din.",
            "fractional_unit" => "para",
            "number_to_basic" => "100",
            "countries" => ["Serbia"]
        ],
        "SCR" => [
            "currency_short" => "rupee",
            "currency" => "Seychellois rupee",
            "symbol" => "₨",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Seychelles"]
        ],
        "SLL" => [
            "currency_short" => "leone",
            "currency" => "Sierra Leonean leone",
            "symbol" => "Le",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Sierra Leone"]
        ],
        "SBD" => [
            "currency_short" => "dollar",
            "currency" => "Solomon Islands dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Solomon Islands"]
        ],
        "SOS" => [
            "currency_short" => "shilling",
            "currency" => "Somali shilling",
            "symbol" => "Sh",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Somalia"]
        ],
        "SLS" => [
            "currency_short" => "shilling",
            "currency" => "Somaliland shilling",
            "symbol" => "Sl",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Somaliland"]
        ],
        "SSP" => [
            "currency_short" => "pound",
            "currency" => "South Sudanese pound",
            "symbol" => "£",
            "fractional_unit" => "piaster",
            "number_to_basic" => "100",
            "countries" => ["South Sudan"]
        ],
        "LKR" => [
            "currency_short" => "rupee",
            "currency" => "Sri Lankan rupee",
            "symbol" => "Rs, රු  or  ரூ",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Sri Lanka"]
        ],
        "SDG" => [
            "currency_short" => "pound",
            "currency" => "Sudanese pound",
            "symbol" => "ج.س.",
            "fractional_unit" => "piastre",
            "number_to_basic" => "100",
            "countries" => ["Sudan"]
        ],
        "SRD" => [
            "currency_short" => "dollar",
            "currency" => "Surinamese dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Suriname"]
        ],
        "SEK" => [
            "currency_short" => "krona",
            "currency" => "Swedish krona",
            "symbol" => "kr",
            "fractional_unit" => "öre",
            "number_to_basic" => "100",
            "countries" => ["Sweden"]
        ],
        "SYP" => [
            "currency_short" => "pound",
            "currency" => "Syrian pound",
            "symbol" => "£ or ل.س",
            "fractional_unit" => "piastre",
            "number_to_basic" => "100",
            "countries" => ["Syria"]
        ],
        "TWD" => [
            "currency_short" => "dollar",
            "currency" => "New Taiwan dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Taiwan"]
        ],
        "TJS" => [
            "currency_short" => "somoni",
            "currency" => "Tajikistani somoni",
            "symbol" => "ЅМ",
            "fractional_unit" => "diram",
            "number_to_basic" => "100",
            "countries" => ["Tajikistan"]
        ],
        "TZS" => [
            "currency_short" => "shilling",
            "currency" => "Tanzanian shilling",
            "symbol" => "Sh",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Tanzania"]
        ],
        "THB" => [
            "currency_short" => "baht",
            "currency" => "Thai baht",
            "symbol" => "฿",
            "fractional_unit" => "satang",
            "number_to_basic" => "100",
            "countries" => ["Thailand"]
        ],
        "TOP" => [
            "currency_short" => "paʻanga",
            "currency" => "Tongan paʻanga",
            "symbol" => "T$",
            "fractional_unit" => "seniti",
            "number_to_basic" => "100",
            "countries" => ["Tonga"]
        ],
        "PRB" => [
            "currency_short" => "ruble",
            "currency" => "Transnistrian ruble",
            "symbol" => "р.",
            "fractional_unit" => "kopek",
            "number_to_basic" => "100",
            "countries" => ["Transnistria"]
        ],
        "TTD" => [
            "currency_short" => "dollar",
            "currency" => "Trinidad and Tobago dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Trinidad and Tobago"]
        ],
        "TND" => [
            "currency_short" => "dinar",
            "currency" => "Tunisian dinar",
            "symbol" => "د.ت",
            "fractional_unit" => "millime",
            "number_to_basic" => "1000",
            "countries" => ["Tunisia"]
        ],
        "TMT" => [
            "currency_short" => "manat",
            "currency" => "Turkmenistan manat",
            "symbol" => "m",
            "fractional_unit" => "tennesi",
            "number_to_basic" => "100",
            "countries" => ["Turkmenistan"]
        ],
        "TVD" => [
            "currency_short" => "dollar",
            "currency" => "Tuvaluan dollar",
            "symbol" => "$",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Tuvalu"]
        ],
        "UGX" => [
            "currency_short" => "shilling",
            "currency" => "Ugandan shilling",
            "symbol" => "Sh",
            "fractional_unit" => "cent",
            "number_to_basic" => "100",
            "countries" => ["Uganda"]
        ],
        "UAH" => [
            "currency_short" => "hryvnia",
            "currency" => "Ukrainian hryvnia",
            "symbol" => "₴",
            "fractional_unit" => "kopiyka",
            "number_to_basic" => "100",
            "countries" => ["Ukraine"]
        ],
        "AED" => [
            "currency_short" => "dirham",
            "currency" => "United Arab Emirates dirham",
            "symbol" => "د.إ",
            "fractional_unit" => "fils",
            "number_to_basic" => "100",
            "countries" => ["United Arab Emirates"]
        ],
        "UYU" => [
            "currency_short" => "peso",
            "currency" => "Uruguayan peso",
            "symbol" => "$",
            "fractional_unit" => "centésimo",
            "number_to_basic" => "100",
            "countries" => ["Uruguay"]
        ],
        "UZS" => [
            "currency_short" => "soʻm",
            "currency" => "Uzbekistani soʻm",
            "symbol" => "so'm or сўм",
            "fractional_unit" => "tiyin",
            "number_to_basic" => "100",
            "countries" => ["Uzbekistan"]
        ],
        "VUV" => [
            "currency_short" => "vatu",
            "currency" => "Vanuatu vatu",
            "symbol" => "Vt",
            "fractional_unit" => null,
            "number_to_basic" => null,
            "countries" => ["Vanuatu"]
        ],
        "VES" => [
            "currency_short" => "soberano",
            "currency" => "Venezuelan bolívar soberano",
            "symbol" => "Bs.S. or Bs.",
            "fractional_unit" => "céntimo",
            "number_to_basic" => "100",
            "countries" => ["Venezuela"]
        ],
        "VND" => [
            "currency_short" => "đồng",
            "currency" => "Vietnamese đồng",
            "symbol" => "₫",
            "fractional_unit" => "hào",
            "number_to_basic" => "10",
            "countries" => ["Vietnam"]
        ],
        "YER" => [
            "currency_short" => "rial",
            "currency" => "Yemeni rial",
            "symbol" => "ر.ي",
            "fractional_unit" => "fils",
            "number_to_basic" => "100",
            "countries" => ["Yemen"]
        ],
        "ZMW" => [
            "currency_short" => "kwacha",
            "currency" => "Zambian kwacha",
            "symbol" => "ZK",
            "fractional_unit" => "ngwee",
            "number_to_basic" => "100",
            "countries" => ["Zambia"]
        ],
        "ZWL" => [
            "currency_short" => "dollar",
            "currency" => "RTGS dollar",
            "symbol" => null,
            "fractional_unit" => null,
            "number_to_basic" => null,
            "countries" => ["Zimbabwe"]
        ],
        "CUC" => [
            "currency_short" => "peso",
            "currency" => "Cuban convertible peso",
            "symbol" => "$",
            "fractional_unit" => "centavo",
            "number_to_basic" => "100",
            "countries" => ["Cuba"]
        ],
        "BAM" => [
            "currency_short" => "mark",
            "currency" => "Bosnia and Herzegovina convertible mark",
            "symbol" => "KM or КМ",
            "fractional_unit" => "fening",
            "number_to_basic" => "100",
            "countries" => ["Bosnia and Herzegovina"]
        ]
    ];

    /**
     * Get the short name and fractional unit for the ISO4217 currency specified.
     *
     * @param string $iso4217Currency
     * @return array
     */
    static function getCurrencyShort(string $iso4217Currency): array
    {
        $data = Currency::directory[$iso4217Currency];
        if (is_null($data)) return false;

        return [$data['currency_short'], $data['fractional_unit'] ?? ""];
    }

    /**
     * Get the full name and fractional units for the ISO4217 currency specified. 
     *
     * @param string $iso4217Currency
     * @return array
     */
    static function getCurrencyLong(string $iso4217Currency): array
    {
        $data = Currency::directory[$iso4217Currency];
        if (is_null($data)) return false;

        return [$data['currency'], $data['fractional_unit'] ?? ""];
    }

    /**
     * Get the whole and decimal currency unit based on the ISO4217 currency specified.
     *
     * @param string $currency
     * @param boolean $useShortName
     * @return array
     */
    static function getCurrency(string $currency, bool $useShortName = true): array
    {
        return $useShortName
            ? static::getCurrencyShort($currency)
            : static::getCurrencyLong($currency);
    }
}
