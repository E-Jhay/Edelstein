<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            //ring
            [
                'name' => 'Zuri Ring',
                'description' => 'Sleek and subtle, this ring is the perfect practical choice for everyday wear. Execute that perfect ring and nail close-up by stacking this classic style for a modern and comfortable look.
                Width of Embellishment – 0.4” Ring Size – Adjustable
                92.5% sterling silver with 1.0-micron gold plating studded with semi-precious polki.
                ',
                'regular_price' => 32.89,
                'quantity' => 10,
                'image1' => 'ring1.jpg',
                'image2' => 'ringsub1.jpg',
                'category_id' => 4
            ],
            [
                'name' => 'Zuri Double Motif Ring',
                'description' => 'This piece will give a hep definition to your hands when you have opted for the robust style.. The perfect pairing with Zuri Double Motif Cuff Bracelet.
                Width of Embellishment - 0.6 " Ring Size – Adjustable
                92.5% sterling silver with 1.0-micron gold plating studded with semi-precious polki.
                ',
                'regular_price' => 39.47,
                'quantity' => 10,
                'image1' => 'ring2.jpg',
                'image2' => 'ringsub2.jpg',
                'category_id' => 4
            ],
            [
                'name' => 'Zuri Multi-Finger Ring',
                'description' => 'Ample bling, classic style, plenty sophistication, the kind of piece that will find place in your jewellery box if bulky or OTT rings are not you.
                Width of Embellishment – 0.45" Ring Size – Adjustable
                92.5% sterling silver with 1.0-micron gold plating studded with semi-precious polki.
                ',
                'regular_price' => 49.34,
                'quantity' => 10,
                'image1' => 'ring3.jpg',
                'image2' => 'ringsub3.jpg',
                'category_id' => 4
            ],
            [
                'name' => 'Alohi Flower Motif Ring',
                'description' => 'This piece is the right size, right style, and the right fit with any look, any time, any day. It is the finishing touch talisman, a must have.
                Width of Embellishment-0.9", Ring Size-Adjustable
                92.5% oxidized sterling silver with pearls and mother of pearl.
                ',
                'regular_price' => 39.47,
                'quantity' => 10,
                'image1' => 'ring4.png',
                'image2' => 'ringsub4.png',
                'category_id' => 4
            ],
            [
                'name' => 'Alohi Mother of Pearl Ring',
                'description' => 'A bold and beautiful piece that mirrors your personality bold and beautiful.
                Pair it with Alohi Mother of Pearl Ring to complete the look.
                Width of Embellishment-1.4", Ring Size-Adjustable
                92.5% oxidized sterling silver with pearls and mother of pearl.                
                ',
                'regular_price' => 128.29,
                'quantity' => 10,
                'image1' => 'ring5.png',
                'image2' => 'ringsub4.png',
                'category_id' => 4
            ],

            //bracelet
            [
                'name' => 'Zuri Line Bracelet',
                'description' => 'Who says ‘perhaps one more’ is only limited to pizza slices and cupcakes? You would go ‘one more’ for this dainty piece to add it to the collection.
                Add the Zuri Double Motif Cuff Bracelet and Zuri Toggle Bracelet to level up for the stacking game.
                Width of Bracelet – 0.35” Size-Adjustable 6.5"-7.5"
                92.5% sterling silver with 1.0-micron gold plating studded with semi-precious polki and fine jewellery enamel.                
                ',
                'regular_price' => 55.92,
                'quantity' => 10,
                'image1' => 'bl2.jpg',
                'image2' => 'blsub2.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Zuri Line Bracelet',
                'description' => 'A little sparkle hurt no one, especially when you want the jewellery to do the talking. The center of attraction for your stacking game.
                On days when you are wearing the heavy ethnic outfit pair it with Zuri Long Dangle Earrings and on days when opting for the simple jeans and top casual look pair it with Polki Dangle Earrings.
                Width of Bracelet – 0.45” Size-Adjustable 6.5"-7.5"
                92.5% sterling silver with 1.0-micron gold plating studded with semi-precious polki and fine jewellery enamel.
                ',
                'regular_price' => 125.00,
                'quantity' => 10,
                'image1' => 'bl3.jpg',
                'image2' => 'blsub3.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Zuri Single Motif Bolo Bracelet',
                'description' => 'A staple piece for ‘I need to wear some jewellery everyday’ kind of phase.
                Add Zuri Long Station Necklace with this piece for days when you feel like adding something extra.
                Width of Bracelet – 0.45” Size- Adjustable
                92.5% sterling silver with 1.0-micron gold plating studded with semi-precious polki and fine jewellery enamel.
                ',
                'regular_price' => 42.76,
                'quantity' => 10,
                'image1' => 'bl4.jpg',
                'image2' => 'blsub4.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Zuri String Bracelet',
                'description' => 'When you visualize an outfit for your bestie’s wedding, the shoes, the bag, the hair you would still feel you are missing something until you add this piece to your look.
                With Zuri Chandelier Earrings and Zuri Multi Finger Ring, you are all set to carry out the bridesmaid duties.
                Width of Bracelet – 1.2” Size- Adjustable 6.5"-7.5"
                92.5% sterling silver with 1.0-micron gold plating studded with semi-precious polki and fine jewellery enamel.
                ',
                'regular_price' => 95.39,
                'quantity' => 10,
                'image1' => 'bl6.jpg',
                'image2' => 'blsub6.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Zuri Toggle Bracelet',
                'description' => 'A versatile pair that helps you navigate from the ‘day to night look’ fuss-free.
                Add the Zuri Line Bracelet to stack it with your wrist watch.
                Width of Bracelet – 0.9”
                92.5% sterling silver with 1.0-micron gold plating studded with semi-precious polki and fine jewellery enamel.
                ',
                'regular_price' => 98.68,
                'quantity' => 10,
                'image1' => 'bl7.jpg',
                'image2' => 'blsub7.jpg',
                'category_id' => 4
            ],

            //earings
            [
                'name' => 'Alohi Crescent Stud Earringst',
                'description' => 'The perfect accent to that oversized shirt dress or the distressed denims on days when you want to dress comfy, fun, and stylish.
                Add the Alohi Nose Ring to give your look a boho spin.
                Length of Earrings - 1.1" , Width of Earrings - 1.4"
                92.5% oxidized sterling silver with pearls and mother of pearl.
                ',
                'regular_price' => 95.39,
                'quantity' => 10,
                'image1' => 'earing1.jpg',
                'image2' => 'earingsub1.jpg',
                'category_id' => 2
            ],
            [
                'name' => 'Alohi Dangle Earrings',
                'description' => 'The mother of pearl might be the star of this pair, but it will take a backseat for you to be the star of the evening.
                Pair it with Alohi Flower Motif and Pearls Bracelet for times when you are in the mood to go all traditional.
                Length of Earrings - 2.0" , Width of Earrings - 1.6"
                92.5% oxidized sterling silver with pearls and mother of pearl.
                ',
                'regular_price' => 203.95,
                'quantity' => 10,
                'image1' => 'earing2.jpg',
                'image2' => 'earingsub2.jpg',
                'category_id' => 2
            ],
            [
                'name' => 'Alohi Dangle with Chain Earrings',
                'description' => 'For all the weddings you have RSVP yes, you might want to RSVP yes to this super versatile pair. From the crop top co-ord set for the mehendi to the kaftan for the pool party, and a saree for the weddings, these beauties are what you would label as lifesavers.
                Length of Earrings - 2.8" , Width of Earrings - 2.0" Length of Chain - 5.0"
                92.5% oxidized sterling silver with pearls and mother of pearl.
                ',
                'regular_price' => 391.45,
                'quantity' => 10,
                'image1' => 'earing3.jpg',
                'image2' => 'earingsub3.jpg',
                'category_id' => 2
            ],
            [
                'name' => 'Alohi Flower Stud Earrings',
                'description' => 'These earrings are proof that classic doesn’t mean sacrificing style. Wear this OTT pair with an understated outfit for that instant style pop.
                From denim on denim look or the summer dress with the Alohi Pendant Necklace, add a little twist to your look.
                Length of Earrings - 1.2" , Width of Earrings - 1.2"
                92.5% oxidized sterling silver with pearls and mother of pearl.
                ',
                'regular_price' => 128.29,
                'quantity' => 10,
                'image1' => 'earing4.jpg',
                'image2' => 'earingsub4.jpg',
                'category_id' => 2
            ],
            [
                'name' => 'Alohi Hair Chain Dangle Earrings',
                'description' => 'The piece for A little bit of this, a little bit of that, a little bit of mix and match kind of days. Pair this bold pair with a banarsee saree, or a chikankari lehenga, or sharara to add completely change your style game.
                Length of Earrings - 1.8" , Width of Earrings - 1.1" Length of Hair chain - 6.0"
                92.5% oxidized sterling silver with pearls and mother of pearl.
                ',
                'regular_price' => 210.53,
                'quantity' => 10,
                'image1' => 'earing5.jpg',
                'image2' => 'earingsub4.jpg',
                'category_id' => 2
            ],

            //bracelet
            [
                'name' => 'Tulip Garden Broad Bracelet',
                'description' => 'Make waves with this statement piece that might give you stiff competition when it comes to turning heads as you walk into the room.
                Width of embellishment - 1.1"
                92.5 sterling silver with 1.0-microns gold plating studded with semi-precious stones and white zircons.
                ',
                'regular_price' => 690.79,
                'quantity' => 15,
                'image1' => 'bl20.jpg',
                'image2' => 'blsub20.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Green Velvet Enamel Chevron Bracelet',
                'description' => 'This interplay of geometry and fashion is a must-have if minimalism is your style.
                Pair with Green Velvet Enamel Chevron Earrings or The Green Velvet Enamel Chevron Studs for the minimalistic vibe.
                Width of embellishment 0.6"
                92.5% sterling silver with 1.0-microns of gold plating studded with white zircon accents and fine jewellery enamel.
                ',
                'regular_price' => 384.87,
                'quantity' => 20,
                'image1' => 'bl19.jpg',
                'image2' => 'blsub19.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Green Velvet Enamel Chevron Bracelet',
                'description' => 'This interplay of geometry and fashion is a must-have if minimalism is your style.
                Pair with Green Velvet Enamel Chevron Earrings or The Green Velvet Enamel Chevron Studs for the minimalistic vibe.
                Width of embellishment 0.6"
                92.5% sterling silver with 1.0-microns of gold plating studded with white zircon accents and fine jewellery enamel.
                ',
                'regular_price' => 384.87,
                'quantity' => 20,
                'image1' => 'bl18.jpg',
                'image2' => 'blsub18.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Black Velvet Enamel Cuff Bracelet',
                'description' => 'Precious armour for women who believe jewellery is much more than just an adornment.
                Width of embellishment 0.6", Bangle size Large (60.5 X 47)
                92.5% sterling silver with 1.0-microns of gold plating studded with white zircon accents and fine jewellery enamel.
                ',
                'regular_price' => 444.08,
                'quantity' => 10,
                'image1' => 'bl11.jpg',
                'image2' => 'blsub11.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Black Velvet Enamel Geometric Floral Cuff Bracelet',
                'description' => 'The cuff exudes a whiff of sophistication, boldness, and femininity at the same time.
                For days when you want your hands to do the talking, pair it with Black Velvet Enamel Ring.
                Width of embellishment 1.1"
                92.5% sterling silver with 1.0-microns of gold plating studded with white zircon accents and fine jewellery enamel.
                ',
                'regular_price' => 358.55,
                'quantity' => 10,
                'image1' => 'bl12.jpg',
                'image2' => 'blsub12.jpg',
                'category_id' => 4
            ],

            [
                'name' => 'Ginkgo Charm Bracelet',
                'description' => 'The romantic influence through the intricate detailing in this dainty piece is the perfect way to add charm to your wrist.
                Wear it solo or stack it up with the Gingko Double Motif Cuff Bracelet to amp up the style quotient.
                Width of embellishment - 0.5", Length -- 7.5"- 8.5" (Adjustable)
                92.5% sterling silver with 1.0-microns of gold plating and a satin finish.
                ',
                'regular_price' => 52.63,
                'quantity' => 15,
                'image1' => 'bl13.jpg',
                'image2' => 'blsub13.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Ginkgo Double Motif Cuff Bracelet',
                'description' => 'The structured and chic cuff is one of the most popular styles in contemporary times. Wear it solo or stack it up with the Gingko Charm Bracelet and let your bold personality do the talking.
                Width of embellishment - 1.1", Bangle size - Adjustable
                92.5% sterling silver with 1.0-microns of gold plating and a satin finish.
                ',
                'regular_price' => 65.79,
                'quantity' => 20,
                'image1' => 'bl14.jpg',
                'image2' => 'blsub14.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Ginkgo Line Bracelet',
                'description' => 'Luxe yet understated, this is a must-have in your jewellery collection for when you are in the mood for something chic but not too heavy.
                Add the Gingko Ring to give your look the finishing touch.
                Width of emblishment-0.5", Bracelet Length-Length -- 6.5"- 7.5" (Adjustable)
                92.5% sterling silver with 1.0-microns of gold plating and a satin finish.
                ',
                'regular_price' => 128.29,
                'quantity' => 20,
                'image1' => 'bl15.jpg',
                'image2' => 'blsub15.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Ginkgo Multiple Motif Cuff Bracelet',
                'description' => 'The intricately textured leaves with the dainty cuff make it a versatile must-have if you like to keep it classy and minimal.
                Perfect for adding a bit of glamour to formal wear.
                Width of emblishment-0.4", Bangle size - Adjustable
                92.5% sterling silver with 1.0-microns of gold plating and a satin finish.
                ',
                'regular_price' => 39.47,
                'quantity' => 30,
                'image1' => 'bl16.jpg',
                'image2' => 'blsub16.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Black Velvet Enamel Geometric Floral Cuff Bracelet',
                'description' => 'The cuff exudes a whiff of sophistication, boldness, and femininity at the same time.
                For days when you want your hands to do the talking, pair it with Black Velvet Enamel Ring.
                Width of embellishment 1.1"
                92.5% sterling silver with 1.0-microns of gold plating studded with white zircon accents and fine jewellery enamel.
                ',
                'regular_price' => 358.55,
                'quantity' => 10,
                'image1' => 'bl12.jpg',
                'image2' => 'blsub12.jpg',
                'category_id' => 4
            ],
        ]);
    }
}
