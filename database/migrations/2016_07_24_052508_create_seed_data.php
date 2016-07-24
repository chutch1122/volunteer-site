<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Listing;
use App\Organization;
use App\Category;
use Carbon\Carbon;

class CreateSeedData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new User();
        $user->name = "Johnny Doe";
        $user->email = "admin@example.com";
        $user->biography = "I am Jonathan Doe!";
        $user->password = bcrypt("1");
        $user->save();

        $user = new User();
        $user->name = "Dylan Geile";
        $user->email = "decegeile@crepecrucible.org";
        $user->biography = "Proud owner of a cookerspace and general busybody.";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization();
        $organization->user_id = $user->id;
        $organization->name = "Crepe Crucible";
        $organization->website = "crepecrucible.org";
        $organization->mission_statement = "It's like a gym, but for your mouth.";
        $organization->description = "A cookerspace, providing the tools needed to create the meal of your dreams.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing();
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Spoon Unbender Needed";
        $listing->description = "A psychic vagabond came in and kept bending our spoons. We requested that he leave, but now the majority of our silverware is bent. We are requesting three people to participate in two four-hour shifts to unbend this silverware. Meals will be provided.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "2";
        $listing->save();

        $user = new User();
        $user->name = "Blake Rhodes";
        $user->email = "_nospaces@gmail.com";
        $user->biography = "The greatest man who ever lived, and I prove it every day.";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization();
        $organization->user_id = $user->id;
        $organization->name = "Church of RA";
        $organization->website = "Providing free meals to our community.";
        $organization->mission_statement = "Spreading the good word of radical acceptance.";
        $organization->description = "";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing();
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Cooks Needed";
        $listing->description = "We need people to prepare meals for our meal centers.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "10";
        $listing->save();

        $user = new User();
        $user->name = "Kirk Tolleshaug";
        $user->email = "ktolleshaug@capecrucible.org";
        $user->biography = "Hi I'm Kirk.";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization();
        $organization->user_id = $user->id;
        $organization->name = "Cape Crucible";
        $organization->website = "capecrucible.org";
        $organization->mission_statement = "It's like a gym, but for your mind.";
        $organization->description = "A makerspace, providing the tools needed to create the tech of your dreams.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing();
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Make ALL the Things!";
        $listing->description = "We need help making all the things! A chair, electronic door lock, 3D printed parts for your model car, whatever.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "2";
        $listing->save();

        $user = new User();
        $user->name = "Cameron Hutchison";
        $user->email = "chutchison@capecrucible.org";
        $user->biography = "Wait, it's already midnight?";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization();
        $organization->user_id = $user->id;
        $organization->name = "Gamers United";
        $organization->website = "www.gamersunited.com";
        $organization->mission_statement = "Gamers working together to make the world a better place.";
        $organization->description = "A group of gamers that strive to improve our communites, both ingame and out.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing();
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Pokemon Go Downtown Clean-Up";
        $listing->description = "Help make downtown Cape a cleaner place. We'll be playing Pokemon Go and cleaning up garbage we find on the streets.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "10";
        $listing->save();

        $category = new Category();//1
        $category->name = "IT";
        $category->save();
        $category = new Category();//2
        $category->name = "Social";
        $category->save();
        $category = new Category();//3
        $category->name = "Animals";
        $category->save();
        $category = new Category();//4
        $category->name = "Physical";
        $category->save();
        $category = new Category();//5
        $category->name = "Education";
        $category->save();
        $category = new Category();//6
        $category->name = "Health";
        $category->save();
        $category = new Category();//7
        $category->name = "Security";
        $category->save();
        $category = new Category();//8
        $category->name = "Arts/Culture";
        $category->save();
        $category = new Category();//9
        $category->name = "Children";
        $category->save();
        $category = new Category();//10
        $category->name = "Community";
        $category->save();
        $category = new Category();//11
        $category->name = "Disaster Relief";
        $category->save();
        $category = new Category();//12
        $category->name = "Faith";
        $category->save();
        $category = new Category();//13
        $category->name = "Government";
        $category->save();
        $category = new Category();//14
        $category->name = "Other";
        $category->save();
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
