<?php
        class Character
        {
            public $name;
            public $race;
            public $gender;
            public $class;
            public $level;
            public $strength;
            public $dexterity;
            public $constitution;
            public $intelligence;
            public $wisdom;
            public $charisma;
            public $skills;
            public $feats;
        }
        
        function chooseName($race, $gender)
        {
            $namesByRace = [
                Race::Human => [
                    Gender::Male => ["John", "David", "Michael", "Christopher", "James", "Matthew", "Daniel", "Andrew", "William", "Joseph"],
                    Gender::Female => ["Sarah", "Emily", "Jessica", "Jennifer", "Elizabeth", "Amy", "Michelle", "Melissa", "Nicole", "Stephanie"]
                ],
                Race::Elf => [
                    Gender::Male => ["Legolas", "Aragorn", "Gandalf", "Elrond", "Thranduil", "Haldir", "Celeborn", "Gil-galad", "Fingolfin", "Eärendil"],
                    Gender::Female => ["Arwen", "Galadriel", "Eowyn", "Lúthien", "Aredhel", "Idril", "Finduilas", "Nimrodel", "Celebrían", "Earwen"]
                ],
                Race::Dwarf => [
                    Gender::Male => ["Gimli", "Thorin", "Balin", "Dwalin", "Fili", "Kili", "Oin", "Gloin", "Dori", "Nori"],
                    Gender::Female => ["Dís", "Elda", "Fríða", "Hilda", "Helga", "Ingrid", "Sigrun", "Unnur", "Gudrun", "Hedvig"]
                ],
                Race::Halfling => [
                    Gender::Male => ["Frodo", "Bilbo", "Samwise", "Peregrin", "Meriadoc", "Hob", "Marcho", "Paladin", "Primula", "Rory"],
                    Gender::Female => ["Rosie", "Merry", "Pippin", "Poppy", "Daisy", "Ruby", "Beryl", "Cora", "Esme", "Wilhelmina"]
                ],
                Race::Dragonborn => [
                    Gender::Male => ["Drake", "Ragnar", "Vorstag", "Thulsa", "Kazuki", "Kaedan", "Raiden", "Hakon", "Jareth", "Torin"],
                    Gender::Female => ["Sera", "Lithia", "Velika", "Kaida", "Zara", "Reyna", "Elys", "Mara", "Vera", "Aria"]
                ],
                Race::Gnome => [
                    Gender::Male => ["Gimble", "Ricket", "Zook", "Fizzwick", "Pip", "Tock", "Wizzle", "Quix", "Muddle", "Blim"],
                    Gender::Female => ["Wren", "Bixi", "Fizzbang", "Tink", "Pip", "Zara", "Flick", "Dixie", "Quinn", "Miri"]
                ],
                Race::HalfElf => [
                    Gender::Male => ["Erevan", "Galen", "Rowan", "Caelan", "Eldrin", "Lorian", "Alden", "Rylan", "Kieran", "Soren"],
                    Gender::Female => ["Ariana", "Elysia", "Lyra", "Elara", "Evelyn", "Aislinn", "Faela", "Aria", "Lorelei", "Sylvia"]
                ],
                Race::HalfOrc => [
                    Gender::Male => ["Gorruk", "Thokk", "Morg", "Drokk", "Gromm", "Skarr", "Brakk", "Gruumsh", "Varg", "Razgul"],
                    Gender::Female => ["Ursa", "Shara", "Lokra", "Ghazra", "Zogga", "Grima", "Hakka", "Mogga", "Zarra", "Ghorza"]
                ],
                Race::Tiefling => [
                    Gender::Male => ["Zephyrus", "Mephistopheles", "Belial", "Lucifer", "Asmodeus", "Leviathan", "Baalzebul", "Moloch", "Diablo", "Samael"],
                    Gender::Female => ["Lilith", "Raven", "Succubus", "Morrigan", "Lamia", "Jezebeth", "Azazel", "Nyarlathotep", "Kali", "Hecate"]
                ],
            ];


            if (isset($namesByRace[$race][$gender])) {
                $names = $namesByRace[$race][$gender];
                $randomIndex = getRandomInt(0, count($names) - 1);
                return $names[$randomIndex];
            }

            return "Unknown";
        }
        
        class Race
        {
            const Human = "Human";
            const Elf = "Elf";
            const Dwarf = "Dwarf";
            const Halfling = "Halfling";
            const Dragonborn = "Dragonborn";
            const Gnome = "Gnome";
            const HalfElf = "Half-Elf";
            const HalfOrc = "Half-Orc";
            const Tiefling = "Tiefling";
        }
        
        class Gender
        {
            const Male = 'Male';
            const Female = 'Female';
        }
        
        $classes = ["Fighter", "Wizard", "Rogue", "Cleric", "Paladin", "Bard"];
        
        $attributes = ["strength", "dexterity", "constitution", "intelligence", "wisdom", "charisma"];
    
        $skillsByClass = [
            "Fighter" => ["Athletics", "Intimidation", "Survival"],
            "Wizard" => ["Arcana", "History", "Investigation"],
            "Rogue" => ["Acrobatics", "Deception", "Stealth"],
            "Cleric" => ["Medicine", "Persuasion", "Religion"],
            "Paladin" => ["Insight", "Intimidation", "Religion"],
            "Bard" => ["Deception", "Performance", "Persuasion"]
        ];
        
        $featsByRace = [
            Race::Human => ["Lucky", "Skilled", "Variant", "Observant", "Resilient", "Mobile", "War Caster", "Actor", "Tough", "Alert"],
            Race::Elf => ["Elven Accuracy", "Fey Teleportation", "Trance", "Wood Elf Magic", "Elven Weapon Training", "Mask of the Wild", "Keen Senses", "Fleet of Foot", "High Elf Cantrip", "Elven Accuracy"],
            Race::Dwarf => ["Dwarven Toughness", "Stonecunning", "Tool Proficiency", "Dwarven Resilience", "Dwarven Combat Training", "Dwarven Armor Training", "Dwarven Weapon Training", "Dwarven Fortitude", "Dwarven Knowledge", "Dwarven Ingenuity"],
            Race::Halfling => ["Lucky", "Brave", "Halfling Nimbleness", "Second Chance", "Stout Resilience", "Bountiful Luck", "Squat Nimbleness", "Naturally Stealthy", "Stout Resilience", "Second Chance"],
            Race::HalfElf => ["Skill Versatility", "Fey Ancestry", "Extra Language", "Darkvision", "Fey Ancestry", "Skill Versatility", "Dilettante", "Versatile Talent", "Ancestral Guardian", "Mask of the Wild"],
            Race::HalfOrc => ["Menacing", "Relentless Endurance", "Savage Attacks", "Powerful Build", "Aggressive", "Primal Intuition", "Brutish Durability", "Orcish Fury", "Swift Charge", "Savage Critical"],
            Race::Dragonborn => ["Draconic Ancestry", "Breath Weapon", "Damage Resistance", "Draconic Roar", "Draconic Wings", "Draconic Senses", "Dragon Fear", "Dragon Hide", "Dragon Wings", "Dragon Fear"],
            Race::Gnome => ["Gnome Cunning", "Artificer's Lore", "Tinker", "Gnome Magic", "Speak with Small Beasts", "Fury of the Small", "Fade Away", "Tinkerer", "Minor Illusion", "Clockwork Toy"],
            Race::Tiefling => ["Infernal Legacy", "Hellish Resistance", "Darkness", "Legacy of Stygia", "Winged", "Legacy of Malbolge", "Hellfire", "Legacy of Cania", "Infernal Constitution", "Legacy of Avernus"],
        ];
?>