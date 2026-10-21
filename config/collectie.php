<?php

/*
 * Auto's in de collectie (later uit Twill). Per auto:
 * - photos: nummers in public/images/auto/<slug>/, de eerste is de omslagfoto
 * - sections: tussenkop met alinea's en/of een lijst ([label, tekst])
 * - specs: technische gegevens, in de zijkolom van de detailpagina
 */

return [

    'cars' => [

        [
            'slug' => 'jaguar',
            'name' => 'Jaguar E-Type Series 3 V12 2+2',
            'year' => 1971,
            'type' => 'Coupé 2+2',
            'tagline' => 'Regency Red · Automaat · Airco · 52.173 miles',
            'description' => 'Jaguar E-Type Series 3 V12 2+2 uit 1971 in Regency Red met beige leder, automaat, originele airconditioning en 52.173 miles. Te koop bij Fenbump Renklup.',
            'photos' => ['01', '03', '04', '07', '11', '16', '21', '23', '28', '32', '35', '41', '46', '48', '61', '69'],
            'intro' => [
                'Een icoon uit de Britse autogeschiedenis in een adembenemend chique kleurcombinatie. Deze Jaguar E-Type Series 3 V12 2+2 uit 1971 is uitgevoerd in de prachtige, diepe fabriekskleur Regency Red, perfect gecombineerd met een stijlvol beige lederen interieur. De auto combineert de legendarische, zijdezachte 5.3 liter V12-motor met het comfort van een automatische versnellingsbak en een zeldzame, originele airconditioning.',
                "Met een tellerstand van slechts 52.173 miles verkeert deze klassieker in een uitstekend onderhouden staat. Dit is de ultieme gentleman's express voor lange, comfortabele ritten.",
            ],
            'sections' => [
                [
                    'heading' => 'Opties en highlights',
                    'list' => [
                        ['Originele V12-motor', 'Krachtig, soepel en voorzien van een prachtig, beschaafd uitlaatgeluid.'],
                        ['Airconditioning', 'Een zeldzame en zeer gewilde optie die zorgt voor comfort tijdens zomerse ritten.'],
                        ['Stuurbekrachtiging', 'Zorgt voor moeiteloos manoeuvreren en een verfijnd rijgedrag.'],
                        ['Tijdloze kleurencombinatie', 'Het Regency Red en het beige interieur versterken de klassieke, luxueuze uitstraling van de Series 3.'],
                    ],
                ],
                [
                    'heading' => 'Staat',
                    'paragraphs' => [
                        'De auto verkeert in een zeer gezonde en goed onderhouden conditie. Het lakwerk heeft een diepe glans en het beige lederen interieur verkeert in een prachtige staat met de juiste patina. Technisch is de auto volledig up-to-date; deze E-Type is direct klaar om van te genieten en droog gestald te worden in een liefhebberscollectie.',
                    ],
                ],
            ],
            'specs' => [
                'Bouwjaar' => '1971',
                'Kilometerstand' => '52.173 miles',
                'Motor' => '5.3L V12 benzine',
                'Transmissie' => 'Automaat',
                'Carrosserie' => '2+2 Coupé',
                'Exterieur' => 'Regency Red',
                'Interieur' => 'Beige leder',
            ],
        ],

        [
            'slug' => 'ferrari',
            'name' => 'Ferrari 330 GT 2+2 Series II',
            'year' => 1965,
            'type' => 'Coupé 2+2',
            'tagline' => '44.548 km · Rijke Nederlandse historie',
            'description' => 'Ferrari 330 GT 2+2 Series II uit 1965 in zilvergrijs met zwart leder, 4.0 Colombo V12, handgeschakelde vijfbak en 44.548 km. Te koop bij Fenbump Renklup.',
            'photos' => ['07', '03', '12', '15', '21', '32', '35', '39', '43', '48', '54', '57', '62', '64', '67', '69'],
            'intro' => [
                'Een zeldzame en uiterst stijlvolle verschijning: deze schitterende Ferrari 330 GT 2+2 Series II uit 1965. Dit technisch uitstekend onderhouden exemplaar is uitgevoerd in een tijdloze combinatie van zilvergrijs metallic met een diepzwart lederen interieur.',
                "Dit exemplaar betreft de geliefde Series II, herkenbaar aan het strakke en elegante front met de enkele koplampen. Onder de indrukwekkende motorkap ligt de iconische 4,0-liter 'Colombo' V12-motor (300 pk), gekoppeld aan de voor de Series II kenmerkende handgeschakelde 5-versnellingsbak. Deze gran turismo combineert de pure, mechanische sportwagenbeleving van Ferrari met het comfort van een echte vierzitter. Met een afgelezen kilometerstand van slechts 44.548 kilometer is deze klassieker klaar voor de volgende verzamelaar of fijnproever.",
            ],
            'sections' => [
                [
                    'heading' => 'Historie en documentatie',
                    'paragraphs' => [
                        'Wat deze 330 GT Series II écht uniek maakt, is de uitgebreide gedocumenteerde geschiedenis. Er is veel Nederlandse (onderhouds)geschiedenis aanwezig. Dit dossier biedt een zeer transparante en waardevolle blik op het verleden en het liefdevolle bezit van de auto in Nederland. Een essentieel detail voor de serieuze liefhebber en een solide basis voor de waardeontwikkeling.',
                    ],
                ],
                [
                    'heading' => 'Staat en techniek',
                    'list' => [
                        ['Technisch', 'De auto bevindt zich in een technisch goed onderhouden staat. De V12 start uitstekend, loopt prachtig rond en levert dat onmiskenbare Ferrari-geluid. De handgeschakelde transmissie met 5 versnellingen schakelt strak en precies.'],
                        ['Exterieur', 'Het lakwerk in elegant zilvergrijs accentueert de vloeiende, door Pininfarina getekende lijnen perfect. Het chroomwerk glanst prachtig en de iconische details van de Series II, zoals de herontworpen luchtsleuven in de voorschermen, komen in deze kleur schitterend tot hun recht.'],
                        ['Interieur', "Het zwarte interieur ademt de sfeer van de jaren '60. Het leder heeft het juiste patina, het houten dashboard is in prachtige staat en alle klassieke Veglia-instrumenten functioneren naar behoren."],
                    ],
                ],
            ],
            'specs' => [
                'Bouwjaar' => '1965',
                'Kilometerstand' => '44.548 km',
                'Motor' => '4.0L Colombo V12 (300 pk)',
                'Transmissie' => 'Handgeschakeld, 5 versnellingen',
                'Carrosserie' => '2+2 Coupé (Pininfarina)',
                'Kleurstelling' => 'Zilvergrijs metallic / zwart leder',
            ],
        ],

        [
            'slug' => 'talbot',
            'name' => 'Talbot 3-Litre Sports Tourer',
            'year' => 1937,
            'type' => 'Sports Tourer',
            'tagline' => 'Chassis 8004 · 53.909 miles',
            'description' => 'Uiterst zeldzame Talbot 3-Litre Sports Tourer uit 1937, chassis 8004, 6-cilinder in-lijn en 53.909 miles. Direct rijdbaar. Te koop bij Fenbump Renklup.',
            'photos' => ['14', '07', '01', '10', '13', '16', '17', '19', '21', '28', '32', '34', '39', '41', '46', '49'],
            'intro' => [
                "Een unieke kans voor verzamelaars en liefhebbers van vooroorlogs Brits industrieel erfgoed: deze schitterende Talbot 3-Litre Sports Tourer. Dit specifieke exemplaar werd gebouwd in 1937 en voor het eerst geregistreerd in 1938. Met zijn prachtige carrosserielijnen, lange motorkap en sportieve open rijkarakter belichaamt deze auto de absolute topklasse van de late jaren '30.",
                "De auto verkeert in een goede en direct rijdbare staat. Dit model combineert statige luxe met serieuze sportprestaties voor zijn tijd. Dankzij het zeldzame carrosserietype is dit een absolute blikvanger bij historische rally's, concours d'élégances of als kroonstuk in een private collectie.",
            ],
            'sections' => [
                [
                    'heading' => 'Wielophanging',
                    'paragraphs' => [
                        "Uitgerust met het innovatieve 'Evenkeel' onafhankelijke voorwielophangingssysteem van Rootes, wat zorgt voor een fantastisch en stabiel weggedrag.",
                    ],
                ],
                [
                    'heading' => 'Staat en historie',
                    'paragraphs' => [
                        "Dit exemplaar is met zorg gekoesterd en bevindt zich in een mooie, gezonde conditie zonder achterstallig werk. Met slechts 53.909 mijlen op de teller en het historisch uiterst belangrijke chassisnummer 8004 is dit een auto met een unieke identiteit. Het open 'Tourer'-ontwerp biedt plaats aan vier personen en is voorzien van een neerklapbare soft-top om optimaal te genieten van het klassieke open rijden.",
                    ],
                ],
            ],
            'specs' => [
                'Bouwjaar' => '1937 (eerste registratie 1938)',
                'Chassisnummer' => '8004',
                'Afgelezen stand' => '53.909 miles',
                'Motor' => '3.181 cc 6-cilinder in-lijn (ca. 80 pk)',
                'Transmissie' => 'Handgeschakeld, 4 versnellingen',
                'Wielophanging' => "Rootes 'Evenkeel', onafhankelijk voor",
            ],
        ],

        [
            'slug' => 'citroen',
            'name' => "Citroën DS19 Cabriolet d'Usine",
            'year' => 1963,
            'type' => 'Cabriolet (Chapron)',
            'tagline' => 'Chapron · Technisch top en upgraded',
            'description' => "Zeldzame Citroën DS19 Cabriolet d'Usine (Chapron) uit 1963 met DY2-motor van 103 pk, handbak en groen LHM-systeem. Direct rijklaar. Te koop bij Fenbump Renklup.",
            'photos' => ['01', '02', '05', '10', '12', '14', '18', '23', '26', '28', '31', '41', '47', '52', '55', '60'],
            'intro' => [
                "Voor de echte liefhebber en verzamelaar: een uiterst zeldzame en iconische Citroën DS19 Cabriolet d'Usine uit 1963. Een origineel in Frankrijk geleverd exemplaar dat elegantie combineert met slimme, rijtechnische upgrades voor optimaal en betrouwbaar rijplezier.",
                "De DS Cabriolet 'Usine' (fabriekscabriolet gebouwd door carrosseriebouwer Henri Chapron) is een van de meest gezochte en waardevaste klassiekers ter wereld. Dit specifieke exemplaar werd in de jaren '90 vakkundig gerestaureerd en is in 2007 naar Nederland geïmporteerd. Sindsdien is de auto technisch uitstekend onderhouden en gekoesterd.",
            ],
            'sections' => [
                [
                    'heading' => 'Upgrades voor de ultieme rijervaring',
                    'paragraphs' => [
                        'Waar vroege DS-modellen soms complex zijn in het dagelijks gebruik, is dit exemplaar in het verleden voorzien van zeer gewilde en professionele modificaties die het rijden én het onderhoud aanzienlijk prettiger maken:',
                    ],
                    'list' => [
                        ['Meer vermogen (DY2-motor)', 'De originele motor is vervangen door een krachtigere DY2-motor uit een DS20, goed voor 103 pk. Dit zorgt voor moderne prestaties en souplesse in het huidige verkeer.'],
                        ['Handgeschakelde versnellingsbak', 'Omgebouwd naar een handgeschakelde transmissie voor directe controle en een actievere rijbeleving.'],
                        ['Groen LHM-systeem', 'Het storingsgevoelige en agressieve rode LHS-hydraulieksysteem is volledig omgebouwd naar het moderne, betrouwbare groene LHM-systeem. Dit betekent probleemloos veren en remmen met vloeistof die overal goed verkrijgbaar is.'],
                    ],
                ],
                [
                    'heading' => 'Een legendarische Godin',
                    'paragraphs' => [
                        "Dit is een unieke kans om bezitter te worden van een legendarische 'Godin' in cabriolet-uitvoering. Een auto die gegarandeerd overal bewonderende blikken trekt en klaar is voor heerlijke zomerritten.",
                    ],
                ],
            ],
            'specs' => [
                'Bouwjaar' => '1963',
                'Herkomst' => 'Frankrijk (origineel Franse auto)',
                'Import NL' => '2007',
                'Motor' => 'DY2 uit een DS20 (103 pk)',
                'Transmissie' => 'Handgeschakeld',
                'Hydrauliek' => 'Groen LHM-systeem',
                'Restauratie' => "Jaren '90, met fraai geleefd patina",
                'Staat' => 'Technisch zeer goed onderhouden, direct rijklaar',
            ],
        ],

        [
            'slug' => 'glas',
            'name' => 'Glas 1700 GT',
            'year' => 1966,
            'type' => 'Coupé (Frua)',
            'tagline' => 'Origineel Nederlands geleverd · NAP logisch',
            'description' => 'Zeldzame Glas 1700 GT Coupé uit 1966, ontworpen door Pietro Frua, origineel Nederlands geleverd met 86.107 km en logisch NAP. Te koop bij Fenbump Renklup.',
            'photos' => ['06', '04', '07', '08', '16', '18', '22', '24', '27', '30', '33', '39', '40', '46', '57', '64'],
            'intro' => [
                "Met trots presenteren wij deze zeldzame Glas 1700 GT Coupé uit juni 1966. Voordat Hans Glas GmbH werd overgenomen door BMW, bouwde de fabriek in Dingolfing onder eigen vlag een aantal van de meest vooruitstrevende en elegante sportwagens van de jaren '60. Dit specifieke model combineert de betrouwbare, krachtige Duitse 1.7 liter motor (100 pk) met een oogverblindend, handgebouwd jasje uit Italië, ontworpen door de legendarische meesterdesigner Pietro Frua. De dieprode lak accentueert de vloeiende, sportieve lijnen van de carrosserie prachtig.",
            ],
            'sections' => [
                [
                    'heading' => 'Pure historie: origineel Nederlands en NAP logisch',
                    'paragraphs' => [
                        "Wat dit exemplaar écht uniek maakt voor de verzamelaar, is zijn herkomst. Waar veel overgebleven GT's later zijn geïmporteerd, is deze auto op 1 juni 1966 nieuw in Nederland geleverd. De uitzonderlijk lage kilometerstand van slechts 86.107 kilometer is volledig aantoonbaar en gecertificeerd met een logisch NAP-rapport. Een absoluut unicum voor een auto van deze leeftijd.",
                    ],
                ],
                [
                    'heading' => 'Rijdersauto voor de fijnproever',
                    'paragraphs' => [
                        "Dankzij de dubbele carburateurs, de bovenliggende nokkenas en het lichte wagengewicht levert deze 1700 GT prestaties die destijds menig sportwagen de baas waren. De auto start prachtig, schakelt trefzeker en biedt een heerlijk mechanische, pure rijbeleving. Het minimalistische zwarte interieur ademt de pure sfeer van de jaren '60, compleet met het klassieke instrumentenpaneel en een sportieve zitpositie.",
                    ],
                ],
            ],
            'specs' => [
                'Merk/model' => 'Hans Glas GmbH 1700 GT Coupé',
                'Bouwjaar' => '1 juni 1966',
                'Kilometerstand' => '86.107 km (origineel, NAP logisch)',
                'Carrosserie' => 'Coupé (ontwerp Pietro Frua)',
                'Motor' => '1.682 cc 4-cilinder (100 pk)',
                'Transmissie' => 'Handgeschakeld, 4 versnellingen',
                'Kleur' => 'Rood',
                'Interieur' => 'Zwart',
            ],
        ],

    ],

];
