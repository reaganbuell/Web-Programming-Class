function calculate() {
    var amt = document.mortgagecalc.principal.value;
    var apr = document.mortgagecalc.apr.value;
    var trm = Math.round(document.mortgagecalc.term.value);
    var re = /^[+]?([.]\d+|\d+[.]?\d*)$/;
    if(re.test(amt) && re.test(apr) && re.test(trm)){
        apr /= 100;
        apr /= 12;
        var mPmt = amt*(apr * Math.pow((1 + apr), trm))/(Math.pow((1 + apr), trm) - 1);
        var sum = mPmt * trm;
        var ttl = sum - amt;
        document.mortgagecalc.pmt.value = "$" + mPmt.toFixed(2);
        document.mortgagecalc.sum.value = "$" + sum.toFixed(2);
        document.mortgagecalc.ttl.value = "$" + ttl.toFixed(2);
    }else{
        window.alert("Negative numbers or non-numeric characters are not allowed.")
    }
}