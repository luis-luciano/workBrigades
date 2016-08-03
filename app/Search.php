<?php

namespace App;

use App\Citizen;

class Search
{
    public static function citizensByNames($search, $include = '')
    {
        $input = normalizeCharacters($search);
        $splittedInput = splitWhiteSpaces($input);

        $citizensWithPersonalInformation = Citizen::searchByNames($splittedInput)->get(['id', 'personal_information_id']);

        // define the citizen caption to display.
        if ($include === 'personal_information') {
            $retrieveCitizenCaption = function ($citizen) {
                return $citizen->full_name.' ('.$citizen->personalInformation->birthday.' - '.$citizen->email.' - '.$citizen->personalInformation->profession.' - '.(is_null($citizen->personalInformation->colony) ? '' : $citizen->personalInformation->colony->name).')';
            };
        } else {
            $retrieveCitizenCaption = function ($citizen) {
                return $citizen->full_name;
            };
        }

        $citizenItems = [];
        // map only id and full names
        foreach ($citizensWithPersonalInformation as $citizen) {
            $name = $retrieveCitizenCaption($citizen);
            $item = ['id' => $citizen->id, 'name' => $name];
            array_push($citizenItems, $item);
        }

        $citizenCandidates = [];
        // loop through the words to find the closest candidates
        foreach ($citizenItems as $item) {
            $citizenCandidates[similar_text($input, $item['name'])][] = $item;
        }

        // key order the citizenCandidates
        krsort($citizenCandidates);

        // prepare the results to show
        $results = [];
        foreach ($citizenCandidates as $hist) {
            for ($i = count($hist) - 1; $i > -1; $i--) {
                $results[] = $hist[$i];
            }
        }

        return $results;
    }
}
