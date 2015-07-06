if ( 'serviceWorker' in navigator ) {

	// Override the default scope of '/' with './', so that the registration applies
	// to the current directory and everything underneath it.
	navigator.serviceWorker.register('/service-worker.js', {
		scope: './'
	}).then(function(registration) {
		
		// At this point, registration has taken place.
		// The service worker will not handle requests until this page and any
		// other instances of this page (in other tabs, etc.) have been
		// closed/reloaded.
		console.log('ServiceWorker registration successful with scope: ', registration.scope);

	}).catch(function(error) {

		// Something went wrong during registration. The service-worker.js file
		// might be unavailable or contain a syntax error.
		console.log('ServiceWorker registration failed: ', error);
	
	});

}










int code = GooglePlayServicesUtil.isGooglePlayServicesAvailable(this);
if ( code != ConnectionResult.SUCCESS ) {
	if ( GooglePlayServicesUtil.isUserRecoverableError(code) ) {
		GooglePlayServicesUtil.getErrorDialog(code, this, 9000).show();
	}
}

