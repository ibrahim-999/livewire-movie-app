<?php

namespace App\Http\Livewire;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use App\Models\TrailerUrl;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class EpisodeIndex extends Component
{

    public Serie $serie;
    public Season $season;

    public $search = '';
    public $sort = 'asc';
    public $perPage = 5;

    public $episodeNumber;
    public $episodeId;
    public $showEpisodeModal = false;
    public $overview;
    public $name;
    public $isPublic;

    public $showTrailer = false;
    public $episode;
    public $trailerName;
    public $embedHtml;

    protected $rules = [
        'name' => 'required',
        'overview' => 'required',
        'episodeNumber' => 'required'
    ];

    // generate season


    public function showEditModal($id)
    {
        $this->episodeId = $id;
        $this->loadEpisode();
        $this->showEpisodeModal = true;
    }
    public function loadEpisode()
    {
        $episode = Episode::findOrFail($this->episodeId);
        $this->name = $episode->name;
        $this->overview = $episode->overview;
        $this->episodeNumber = $episode->episode_number;
        $this->isPublic = $episode->is_public;
    }
    public function closeEpisodeModal()
    {
        $this->showEpisodeModal = false;
        $this->showTrailer = false;
    }
    public function updateEpisode()
    {
        $this->validate();
        $episode = Episode::findOrFail($this->episodeId);
        $episode->update([
            'name' => $this->name,
            'episode_number' => $this->episodeNumber,
            'overview' => $this->overview,
            'is_public' => $this->isPublic
        ]);
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Episode updated']);
        $this->reset(['episodeNumber', 'name', 'overview', 'episodeId', 'showEpisodeModal']);
    }
    public function deleteEpisode($id)
    {
        $episode = Episode::findOrFail($id);
        $episode->delete();
        $this->reset(['episodeNumber', 'name', 'overview', 'episodeId', 'showEpisodeModal']);
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Episode deleted']);
    }
    public function resetFilters()
    {
        $this->reset();
    }

    public function showTrailerModal($episodeId)
    {
        $this->episode = Episode::findOrFail($episodeId);
        $this->showTrailer = true;
    }

    public function addTrailer()
    {
        $this->episode->trailers()->create([
            'name' => $this->trailerName,
            'embed_html' => $this->embedHtml
        ]);
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Trailer added']);
        $this->reset('episode', 'showTrailer', 'trailerName', 'embedHtml');
    }

    public function deleteTrailer($trailerId)
    {
        $trailer = TrailerUrl::findOrFail($trailerId);
        $trailer->delete();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Trailer deleted']);
        $this->reset('episode', 'showTrailer', 'trailerName', 'embedHtml');
    }

    public function render()
    {
        return view('livewire.episode-index', [
            'episodes' => Episode::where('season_id', $this->season->id)->search('name', $this->search)->orderBy('name', $this->sort)->paginate($this->perPage)
        ]);
    }
}
