package draws

// Response is the response from the feed
type Reponse struct {
	Results  []Result      `json:"result"`
	Messages []interface{} `json:"messages"`
}

// Result is the key result
type Result struct {
	Type           string        `json:"type"`
	Key            string        `json:"key"`
	Name           string        `json:"name"`
	Autoplayable   string        `json:"autoplayable"`
	GameTypes      []GameTypes   `json:"game_types,omitempty"`
	Draws          []Draws       `json:"draws,omitempty"`
	Days           []Day         `json:"days,omitempty"`
	Addons         []interface{} `json:"addons,omitempty"`
	QuickpickSizes []int         `json:"quickpick_sizes,omitempty"`
	Lottery        Lottery       `json:"lottery,omitempty"`
	Draw           Draw          `json:"draw,omitempty"`
}

// Draw is the type of draw
type Draw struct {
	Name                  string  `json:"name"`
	Description           string  `json:"description"`
	DrawNumber            int     `json:"draw_number"`
	DrawStop              string  `json:"draw_stop"`
	DrawDate              string  `json:"draw_date"`
	Prize                 Prize   `json:"prize"`
	Offers                []Offer `json:"offers"`
	TermsAndConditionsURL string  `json:"terms_and_conditions_url"`
}

// Offer is the offer details
type Offer struct {
	Name           string      `json:"name"`
	Key            string      `json:"key"`
	NumTickets     int         `json:"num_tickets"`
	Price          Price       `json:"price"`
	PricePerTicket Price       `json:"price_per_ticket"`
	Ribbon         string      `json:"ribbon"`
	BonusPrize     interface{} `json:"bonus_prize"`
}

// Price is the cost
type Price struct {
	Amount   string `json:"amount"`
	Currency string `json:"currency"`
}

// Prize is the details of the prize
type Prize struct {
	Type             string       `json:"type"`
	CardTitle        string       `json:"card_title"`
	Name             string       `json:"name"`
	Description      string       `json:"description"`
	Content          PrizeContent `json:"content"`
	Value            Price        `json:"value"`
	ValueIsExact     bool         `json:"value_is_exact"`
	HeroImage        interface{}  `json:"hero_image"`
	CarouselImages   []string     `json:"carousel_images"`
	FeatureDrawImage interface{}  `json:"feature_draw_image"`
	EdmImage         string       `json:"edm_image"`
}

// PrizeContent is for details for customer
type PrizeContent struct {
	SalesPitchHeading1    string   `json:"sales_pitch_heading_1"`
	SalesPitchSubHeading1 string   `json:"sales_pitch_sub_heading_1"`
	Paragraph1            string   `json:"paragraph_1"`
	Paragraph2            string   `json:"paragraph_2"`
	Paragraph3            string   `json:"paragraph_3"`
	Image                 string   `json:"image"`
	SalesPitchHeading2    string   `json:"sales_pitch_heading_2"`
	SalesPitchSubHeading2 string   `json:"sales_pitch_sub_heading_2"`
	Features              []string `json:"features"`
}

// Draws is the draws available
type Draws struct {
	Name         interface{}  `json:"name"`
	Date         string       `json:"date"`
	Stop         string       `json:"stop"`
	DrawNo       int          `json:"draw_no"`
	PrizePool    Price        `json:"prize_pool"`
	JackpotImage JackpotImage `json:"jackpot_image"`
}

// JackpotImage is the image for the jackpot
type JackpotImage struct {
	ImageName          string `json:"image_name"`
	ImageURL           string `json:"image_url"`
	SvgURL             string `json:"svg_url"`
	ImageWidth         int    `json:"image_width"`
	ImageHeight        int    `json:"image_height"`
	ContentDescription string `json:"content_description"`
}

// GameTypes is the type of games
type GameTypes struct {
	Key         string      `json:"key"`
	Name        string      `json:"name"`
	Description string      `json:"description"`
	GameOffers  []GameOffer `json:"game_offers"`
}

// GameOffer is the offer for the game
type GameOffer struct {
	Key             string        `json:"key"`
	Name            string        `json:"name"`
	Description     string        `json:"description"`
	Price           Price         `json:"price"`
	MinGames        int           `json:"min_games"`
	MaxGames        int           `json:"max_games"`
	Multiple        int           `json:"multiple"`
	Ordered         bool          `json:"ordered"`
	GameIncrement   GameIncrement `json:"game_increment"`
	EquivalentGames int           `json:"equivalent_games"`
	NumberSets      []NumberSet   `json:"number_sets"`
	DisplayRange    interface{}   `json:"display_range"`
}

// NumberSet is the number set
type NumberSet struct {
	First int   `json:"first"`
	Last  int   `json:"last"`
	Sets  []Set `json:"sets"`
}

// Set is the set
type Set struct {
	Name  string `json:"name"`
	Count int    `json:"count"`
}

// GameIncrement is the increment for the game
type GameIncrement struct {
	Num4 int `json:"4"`
}

// Lottery is the lottery detials
type Lottery struct {
	ID           string `json:"id"`
	Name         string `json:"name"`
	Desc         string `json:"desc"`
	Multidraw    bool   `json:"multidraw"`
	Type         string `json:"type"`
	IconURL      string `json:"icon_url"`
	IconWhiteURL string `json:"icon_white_url"`
	PlayURL      string `json:"play_url"`
	LotteryID    int    `json:"lottery_id"`
}

// Day is the day for the result
type Day struct {
	Name  string `json:"name"`
	Value int    `json:"value"`
}
