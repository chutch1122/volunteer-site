<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Contact;
use App\Organization;

class CreateContactsSeedData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $contact = new Contact();
        $contact->name = "Dylan Geile";
        $contact->email = "decegeile@crepecrucible.org";
        $contact->phone_number = "573-768-4421";
        $contact->fax_number = "+1-212-9876543";
        $contact->save();

        $organization = App\Organization::find(1);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Blake Rhodes";
        $contact->email = "_nospaces@gmail.com";
        $contact->phone_number = "573-225-4952";
        $contact->fax_number = "+1-232-4863521";
        $contact->save();

        $organization = App\Organization::find(2);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Kirk Tolleshaug";
        $contact->email = "ktolleshaug@capecrucible.org";
        $contact->phone_number = "573-768-5728";
        $contact->fax_number = "+1-213-9264211";
        $contact->save();

        $organization = App\Organization::find(3);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Cameron Hutchison";
        $contact->email = "chutchison@capecrucible.org";
        $contact->phone_number = "573-517-8765";
        $contact->fax_number = "+1-212-2648975";
        $contact->save();

        $organization = App\Organization::find(4);
        $organization->contacts()->attach($contact->id);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
