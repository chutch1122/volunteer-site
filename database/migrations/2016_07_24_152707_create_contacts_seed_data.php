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
        $contact->phone_number = "5737684421";
        $contact->fax_number = "2129876543";
        $contact->save();

        $organization = App\Organization::find(1);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Blake Rhodes";
        $contact->email = "_nospace@gmail.com";
        $contact->phone_number = "5732254952";
        $contact->fax_number = "2324863521";
        $contact->save();

        $organization = App\Organization::find(2);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Kirk Tolleshaug";
        $contact->email = "ktolleshaug@capecrucible.org";
        $contact->phone_number = "5737685728";
        $contact->fax_number = "2139264211";
        $contact->save();

        $organization = App\Organization::find(3);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Cameron Hutchison";
        $contact->email = "chutchison@capecrucible.org";
        $contact->phone_number = "5735178765";
        $contact->fax_number = "2122648975";
        $contact->save();

        $organization = App\Organization::find(4);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Kitty Mason";
        $contact->email = "kmason@childrenssafety.net";
        $contact->phone_number = "5738678495";
        $contact->fax_number = "5738573947";
        $contact->save();

        $organization = App\Organization::find(5);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Sam Harris";
        $contact->email = "sharris@petsforvets.net";
        $contact->phone_number = "5732388574";
        $contact->fax_number = "5732385847";
        $contact->save();

        $organization = App\Organization::find(6);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Jenny Snoops";
        $contact->email = "jsnoops@capehealth.care";
        $contact->phone_number = "5732389686";
        $contact->fax_number = "5732388059";
        $contact->save();

        $organization = App\Organization::find(7);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Stan Goldberg";
        $contact->email = "sgoldberg@spacesafe.org";
        $contact->phone_number = "5732380094";
        $contact->fax_number = "5732387734";
        $contact->save();

        $organization = App\Organization::find(8);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Seth Rollins";
        $contact->email = "srollins@grapplekids.net";
        $contact->phone_number = "5732382746";
        $contact->fax_number = "5732385647";
        $contact->save();

        $organization = App\Organization::find(9);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Blake Rhodes";
        $contact->email = "leader@cult-of-ra.com";
        $contact->phone_number = "5732389845";
        $contact->fax_number = "5732383355";
        $contact->save();

        $organization = App\Organization::find(10);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Seaira Jenkins";
        $contact->email = "sjenkins@12k.us.edu";
        $contact->phone_number = "5732388463";
        $contact->fax_number = "5732381165";
        $contact->save();

        $organization = App\Organization::find(11);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Petey Dsouza";
        $contact->email = "pdsouza@petshel.ter";
        $contact->phone_number = "5732387755";
        $contact->fax_number = "5732382345";
        $contact->save();

        $organization = App\Organization::find(12);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Scarlet Jones";
        $contact->email = "sjones@walksafe.org";
        $contact->phone_number = "5732389034";
        $contact->fax_number = "5732381212";
        $contact->save();

        $organization = App\Organization::find(13);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Seth Rollins";
        $contact->email = "srollins@grapplekids.net";
        $contact->phone_number = "5732384545";
        $contact->fax_number = "5732384545";
        $contact->save();

        $organization = App\Organization::find(14);
        $organization->contacts()->attach($contact->id);

        $contact = new Contact();
        $contact->name = "Sami Zayne";
        $contact->email = "szayne@grapplekids.net";
        $contact->phone_number = "5732380900";
        $contact->fax_number = "5732383222";
        $contact->save();

        $organization = App\Organization::find(15);
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
