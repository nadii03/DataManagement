const api = 'https://travelpayouts-travelpayouts-flight-data-v1.p.rapidapi.com/v1/prices/direct?currency=CAD&origin=';
const options = {
	method: 'GET',
	headers: {
		'X-Access-Token': '79ef92e03980b6fa09ce07453866bcff',
		'X-RapidAPI-Key': 'f510ce46bbmsh61124120e238c46p10eb24jsnbe5788d0ce27',
		'X-RapidAPI-Host': 'travelpayouts-travelpayouts-flight-data-v1.p.rapidapi.com'
	}
};

document.getElementById('start').addEventListener('submit', function (event) {
	event.preventDefault();
	load();	
})
const load = async () => {
	try {
		var destination = document.getElementById('destination').value;
		var origin = document.getElementById('origin').value;
		var d_date = document.getElementById('d_date').value;

		const url = api + origin + '&destination=' + destination + '&depart_date=' + d_date;
		const response = await fetch(url, options);
		const contentType = response.headers.get('Content-Type');

		if (contentType && contentType.includes('application/json')) {
	    const result = await response.json();
	    console.log(result);
	    displayFlights(result);
	    return result;
	  
	} else {
	    console.log(await response.text());
	    console.log(response.status);
		console.log(response.headers);
	}
		
	} catch (error) {
		console.error(error);
		console.error('Error:', error.message);
	    console.error('Stack trace:', error.stack);
	}
}
const flightsList = document.getElementById("flightsList");
// Define the list of allowed airlines
const allowedAirlines = ['AC', 'B6', 'FZ', 'EK', 'QR', 'EY', 'AI'];

const displayFlights = (result) => {
	const airportsData = result.data;

	if (airportsData && typeof airportsData === 'object') {
		const htmlString = Object.entries(airportsData)
		.map(([airportCode, flights]) => {
			// Filter flights based on allowed airlines
                const filteredFlights = Object.values(flights)
                    .filter((flight) => allowedAirlines.includes(flight.airline));

                // Map over each airport's flights
                const airportFlights = filteredFlights
                    .map((flight) => {
                    	 // Call updateSeats with the selected flight
                        updateSeats(flight);

                        return `
                        <div class="flight-card">
                        <p class="airline-label">Airline:</p>
                            <p>${flight.airline}<p>
                          <p class="price-label">Price:</p>
                            <p>$${flight.price}</p>
                           <p class="flight-number-label">Flight Number:</p>
                            <p>${flight.flight_number}</p>
                            <p class="departure-label">Departure:</p>
                            <p>${flight.departure_at}</p>
                            <button class="book-now-button" onclick="bookNow('${flight.airline}', '${flight.flight_number}','${flight.price}','${flight.departure_at}','${flight.return_at}')">Book Now</button>
                        </div>`;  
                          
                    })
                    .join('');

                // Return HTML for each airport
                return `
                <div class="airport">
                    <h2>${airportCode}</h2>
                    ${airportFlights}
                </div>`;
            })
		.join('');
		flightsList.innerHTML = htmlString;

	} else {
	console.error('Invalid data format received:', flights);
        // Optionally handle the case when flights is not an array (e.g., display an error message)
    }
 };

// Function to update seats dynamically based on the selected flight
function updateSeats(selectedFlight) {
    var seatsInput = document.getElementById("seats");

    let seats = 0;
    // Determine the airline based on the selected flight
    switch (selectedFlight.airline) {
        case 'AC':
            seats = 300;
            break;
        case 'B6':
            seats = 200;
            break;
        case 'FZ':
            seats = 200;
            break;
        case 'EK':
            seats = 350;
            break;
        case 'QR':
            seats = 250;
            break;
        case 'EY':
            seats = 350;
            break;
        case 'AI':
            seats = 270;
            break;
        default:
            seats = 0;
    }

    seatsInput.value = seats;
    document.getElementById("hiddenSeats").value = seats;
}

	// Function to handle the "Book Now" button click
    function bookNow(airline, flightID, price, departureDate, returnDate) {	

    alert(`Booking now!`);
    const bookingUrl = `extra.php?airline=${encodeURIComponent(airline)}&flightID=${encodeURIComponent(flightID)}&price=${encodeURIComponent(price)}&departure_date=${encodeURIComponent(departureDate)}&return_date=${encodeURIComponent(returnDate)}`;
    window.location.href = bookingUrl;
    }
