result = "";
for(x = 2; x <= 9; x++)
{
    result += "Nhân " + x + "\n";
    for(y = 1; y <= 10 ; y++)
    {
        result += x + " * " + y + " = " + x*y + "\n";
    }
    result += "---------\n";
}
console.log(result);