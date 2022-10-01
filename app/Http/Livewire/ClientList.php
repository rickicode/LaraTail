<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use DB;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\WithPagination;

class ClientList extends Component
{
    use WithPagination;

    public $search;
    public $page = 1;
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public $client;
    public $clientId, $firstname, $lastname, $oldcode, $code, $max_users, $bandwidth_down_kbps, $bandwidth_up_kbps, $telepon, $price, $active;

    public $isModalOpen = 0;
    public $isDelete = 0;


    protected function rules()
    {
        return [
            'firstname' => 'required|string|min:4',
            'lastname' => 'required|string|min:4',
            'code' => 'required|string|min:3|unique:clients,code,' . $this->clientId,
            'max_users' => 'required|numeric',
            'bandwidth_down_kbps' => 'required|numeric|min:4',
            'bandwidth_up_kbps' => 'required|numeric|min:4',
            'telepon' => 'required|numeric',
            'price' => 'required|numeric',
            'active' => 'required'
        ];
    }

    public function render()
    {

        SEOTools::setTitle('Client List');
        SEOTools::setDescription('HIJINETWORK');
        //SEOTools::opengraph()->setUrl('http://current.url.com');
        //SEOTools::setCanonical('https://codecasts.com.br/lesson');
        //SEOTools::opengraph()->addProperty('type', 'articles');
        //SEOTools::twitter()->setSite('@rickicode');
        // SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');

        $clients = !empty($this->search) ? Client::where('code', 'like', '%' . $this->search . '%')->orWhere('firstname', 'like', '%' . $this->search . '%')->get() : Client::latest()->paginate(10);
        return view('clients.client-index', [
            'clients' => $clients,
        ]);
    }


    public function create()
    {
        $this->resetCreateForm();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->firstname = '';
        $this->lastname = '';
        $this->oldcode = '';
        $this->code = '';
        $this->max_users = '';
        $this->bandwidth_down_kbps = '';
        $this->bandwidth_up_kbps = '';
        $this->telepon = '';
        $this->price = '';
        $this->active = '';
    }

    public function store()
    {
        $this->validate();

        Client::updateOrCreate([
            'id' => $this->clientId
        ], [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'code' => $this->code,
            'max_users' => $this->max_users,
            'bandwidth_down_kbps' => $this->bandwidth_down_kbps,
            'bandwidth_up_kbps' => $this->bandwidth_up_kbps,
            'telepon' => $this->telepon,
            'price' => $this->price,
            'active' => $this->active
        ]);

        session()->flash('message', $this->clientId ? 'Data updated successfully.' : 'Data added successfully.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {

        $post = Client::findOrFail($id);
        $this->clientId = $id;
        $this->firstname = $post->firstname;
        $this->lastname = $post->lastname;
        $this->code = $post->code;
        $this->max_users = $post->max_users;
        $this->bandwidth_down_kbps = $post->bandwidth_down_kbps;
        $this->bandwidth_up_kbps = $post->bandwidth_up_kbps;
        $this->telepon = $post->telepon;
        $this->price = $post->price;
        $this->active = $post->active;

        $this->openModal();
    }


    public function confirmArticleDeletion($id)
    {
        //$article->delete();
        $this->isDelete = $id;
    }


    public function delete(Client $client)
    {
        // Client::find($id)->delete();
        $client->delete();
        $this->isDelete = false;
        session()->flash('message', 'Data deleted successfully.');
    }
}
