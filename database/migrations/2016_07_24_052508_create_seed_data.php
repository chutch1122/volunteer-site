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

        $user = new User(); //1
        $user->name = "Johnny Doe";
        $user->email = "admin@example.com";
        $user->biography = "I am Jonathan Doe!";
        $user->password = bcrypt("1");
        $user->save();

        $user = new User(); //2
        $user->name = "Dylan Geile";
        $user->email = "decegeile@crepecrucible.org";
        $user->biography = "Proud owner of a cookerspace and general busybody.";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //1
        $organization->user_id = $user->id;
        $organization->name = "Crepe Crucible";
        $organization->website = "crepecrucible.org";
        $organization->mission_statement = "It's like a gym, but for your mouth.";
        $organization->description = "A cookerspace, providing the tools needed to create the meal of your dreams.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing();  //1
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Spoon Unbender Needed";
        $listing->description = "A psychic vagabond came in and kept bending our spoons. We requested that he leave, but now the majority of our silverware is bent. We are requesting three people to participate in two four-hour shifts to unbend this silverware. Meals will be provided.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "2";
        $listing->contact_id ="1";
        $listing->save();

        $user = new User(); //3
        $user->name = "Blake Rhodes";
        $user->email = "underscorenospaces@gmail.com";
        $user->biography = "The greatest man who ever lived, and I prove it every day.";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization();//2
        $organization->user_id = $user->id;
        $organization->name = "Church of RA";
        $organization->website = "Providing free meals to our community.";
        $organization->mission_statement = "Spreading the good word of radical acceptance.";
        $organization->description = "";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //2
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Cooks Needed";
        $listing->description = "We need people to prepare meals for our meal centers.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "10";
        $listing->contact_id ="2";
        $listing->save();

        $user = new User(); //4
        $user->name = "Kirk Tolleshaug";
        $user->email = "ktolleshaug@capecrucible.org";
        $user->biography = "Hi I'm Kirk.";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //3
        $organization->user_id = $user->id;
        $organization->name = "Cape Crucible";
        $organization->website = "capecrucible.org";
        $organization->mission_statement = "It's like a gym, but for your mind.";
        $organization->description = "A makerspace, providing the tools needed to create the tech of your dreams.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //3
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Make ALL the Things!";
        $listing->description = "We need help making all the things! A chair, electronic door lock, 3D printed parts for your model car, whatever.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "2";
        $listing->contact_id ="3";
        $listing->save();

        $user = new User(); //5
        $user->name = "Cameron Hutchison";
        $user->email = "chutchison@capecrucible.org";
        $user->biography = "Wait, it's already midnight?";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //4
        $organization->user_id = $user->id;
        $organization->name = "Gamers United";
        $organization->website = "www.gamersunited.com";
        $organization->mission_statement = "Gamers working together to make the world a better place.";
        $organization->description = "A group of gamers that strive to improve our communites, both ingame and out.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //4
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Pokemon Go Downtown Clean-Up";
        $listing->description = "Help make downtown Cape a cleaner place. We'll be playing Pokemon Go and cleaning up garbage we find on the streets.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "10";
        $listing->contact_id ="4";
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


        $user = new User(); //6
        $user->name = "Kitty Mason";
        $user->email = "kmason@childrensafety.net";
        $user->biography = "I love kids!";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //5
        $organization->user_id = $user->id;
        $organization->name = "Children Safety Net";
        $organization->website = "www.childrensafety.net";
        $organization->mission_statement = "Keep kids safe online";
        $organization->description = "Educating parents about online safety";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //5
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Moderators Needed";
        $listing->description = "We neeed moderators for our facebook group";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "2";
        $listing->contact_id ="5";
        $listing->save();

        $user = new User(); //7
        $user->name = "Sam Harris";
        $user->email = "sharris@petsforvets.net";
        $user->biography = "Former Captain in the US Army, and dog lover";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //6
        $organization->user_id = $user->id;
        $organization->name = "Pets for Vets";
        $organization->website = "petsforvets.net";
        $organization->mission_statement = "Their service deserves our service animals";
        $organization->description = "We provide serive animals to disable veterns";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //6
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Groomers needed";
        $listing->description = "We need groomers to keep the service animals groomed.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "3";
        $listing->contact_id ="6";
        $listing->save();

        $user = new User(); //8
        $user->name = "Jenny Snoops";
        $user->email = "jsnoops@capehealth.care";
        $user->biography = "RN and humanitarian.";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //7
        $organization->user_id = $user->id;
        $organization->name = "Cape Public Health Services";
        $organization->website = "capehealth.care";
        $organization->mission_statement = "Serving Capes Heath Needs";
        $organization->description = "We provide free health care to those who need it most.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //7
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Visit Elderly";
        $listing->description = "We need people to visit our elderly patients and drivers.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "6";
        $listing->contact_id ="7";
        $listing->save();

        $user = new User(); //9
        $user->name = "Stan Goldberg";
        $user->email = "sgoldberg@spacesafe.org";
        $user->biography = "Car enthusiast and entertainer";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //8
        $organization->user_id = $user->id;
        $organization->name = "Safe Space Cape";
        $organization->website = "spacesafe.org/capegirardeau";
        $organization->mission_statement = "Creating public places we can all enjoy";
        $organization->description = "Educate and support areas who wish to create safe spaces with in the community";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //8
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Printing Service and Design";
        $listing->description = "Need designers to create signs and people to help print them out for us";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "7";
        $listing->contact_id ="8";
        $listing->save();

        $user = new User(); //10
        $user->name = "Dean Ambrose";
        $user->email = "dambrose@graplekids.net";
        $user->biography = "Former WWE World Champion and motivational speaker.";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //9
        $organization->user_id = $user->id;
        $organization->name = "Cape Youth Wrestling";
        $organization->website = "GrappleKids.net";
        $organization->mission_statement = "Buidling disciplin and character for tomarrows leaders";
        $organization->description = "We provide a friendly and safe eviroment for kids to learn the skills to grapple with life's challenges.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //9
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Coaches Wanted";
        $listing->description = "We need some coaches for our feather weight division, former experiance in freestyle ";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "9";
        $listing->contact_id ="9";
        $listing->save();

        $user = new User(); //11
        $user->name = "Jank Starr";
        $user->email = "jstarr@noosphere.ddns.net";
        $user->biography = "Public Speaker and author";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //10
        $organization->user_id = $user->id;
        $organization->name = "Radical Relief";
        $organization->website = "";
        $organization->mission_statement = "We help people move on.";
        $organization->description = "We provide disaster recovery to aid those who have faced hard times.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //10
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Grief Counseler Needed";
        $listing->description = "We are looking for experts to help aid those whose families were victums of the comet strike outside of Jackson.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "12";
        $listing->contact_id ="10";
        $listing->save();

        $user = new User(); //12
        $user->name = "Seaira Jenkins";
        $user->email = "sjenkins@k12.us.edu";
        $user->biography = "Teacher trying to make the world better";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //11
        $organization->user_id = $user->id;
        $organization->name = "County FEMA Pipes";
        $organization->website = "";
        $organization->mission_statement = "Create funding foundations for all.";
        $organization->description = "We distribute the funds needed in disaster situations quickly and purposefully.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "CPAs for Days";
        $listing->description = "We need CPAs to help review our distribution channels and find oppertunities";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "13";
        $listing->contact_id ="11";
        $listing->save();

        $user = new User(); //
        $user->name = "Petey Dsouza";
        $user->email = "pdsouza@petshel.ter";
        $user->biography = "Animal Lover and Professional XML Parser";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //12
        $organization->user_id = $user->id;
        $organization->name = "Pet Shelter";
        $organization->website = "petshel.ter";
        $organization->mission_statement = "New homes for old friends";
        $organization->description = "We find safe homes for animals so they are not abandoned.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //12
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Dog Walkers Needed";
        $listing->description = "We need people to walk all these dogs! SO MANY DOGGOS!";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "3";
        $listing->contact_id ="12";
        $listing->save();

        $user = new User(); //14
        $user->name = "Scarlet Jones";
        $user->email = "sjones@walksafe.org";
        $user->biography = "Former police officer now retired, Scarlet keeps the streets safe at night in other ways.";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //13
        $organization->user_id = $user->id;
        $organization->name = "Night Escorts";
        $organization->website = "www.walksafe.org";
        $organization->mission_statement = "Keep safe with a buddy.";
        $organization->description = "We provide escorts for people traveling on foot downtown.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //13
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Escorts wanted, all genders";
        $listing->description = "We need able bodied people to serve as escorts for individuals walking downtown hunting pokemon. Must be 18";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "7";
        $listing->contact_id ="13";
        $listing->save();

        $user = new User(); //15
        $user->name = "Roman Reigns";
        $user->email = "rreigns@childrensart.org";
        $user->biography = "I'm not a bad guy. I'm not a good guy. I'm the guy.";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //14
        $organization->user_id = $user->id;
        $organization->name = "Kids Draw";
        $organization->website = "www.childrensart.org/cape";
        $organization->mission_statement = "Further the Art of Raising Kids";
        $organization->description = "We teach kids self expression.";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //14
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Color Pencil Sharpeners";
        $listing->description = "These kids really go through the pencils, we need to sharpen the up.";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "8";
        $listing->contact_id ="14";
        $listing->save();

        $user = new User(); //
        $user->name = "Kevin Owens";
        $user->email = "KO@gmail.com";
        $user->biography = "I am a family man and a prize fighter.";
        $user->password = bcrypt("123456");
        $user->save();

        $organization = new Organization(); //15
        $organization->user_id = $user->id;
        $organization->name = "Fill Line";
        $organization->website = "";
        $organization->mission_statement = "Buckets on Demand";
        $organization->description = "We provide sandbags and the people to fill them in case of flooding";
        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $listing = new Listing(); //
        $listing->organization_id = $organization->id;
        $listing->creator_id = $user->id;
        $listing->title = "Sandbag Folders";
        $listing->description = "We need to stay ready, let's fold some sandbags!!!";
        $listing->starts_at = Carbon::Now();
        $listing->category_id = "11";
        $listing->contact_id ="15";
        $listing->save();

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
