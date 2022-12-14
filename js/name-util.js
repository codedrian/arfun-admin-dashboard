function getUserDisplayName(user) {
    var displayName = "";
    var firstName = user["firstName"];
    var lastName = user["lastName"];
    var midName = user["midName"];
  
    var formattedFname = "";
    var formattedLname = "";
    var formattedMidName = "";
  
    var fNameSegments = firstName.split(" ");
    var lNameSegments = lastName.split(" ");
  
    for(var i = 0; i < fNameSegments.length; i++){
      formattedFname += fNameSegments[i][0].toUpperCase() + fNameSegments[i].substring(1);
  
      if(i != fNameSegments.length - 1){
        formattedFname += " ";
      }
    }
  
    for(var i = 0; i < lNameSegments.length; i++){
      formattedLname += lNameSegments[i][0].toUpperCase() + lNameSegments[i].substring(1);
  
      if(i != lNameSegments.length - 1){
        formattedLname += " ";
      }
    }
  
    if (midName != "" || midName != null) {
      midName.split(" ").forEach(segments => {
        formattedMidName += segments[0].toUpperCase() + ".";
      })
  
      displayName =
        formattedFname + " " + formattedMidName + " " + formattedLname;
    } else {
      displayName = formattedFname + " " + formattedLname;
    }
  
    return displayName;
  }