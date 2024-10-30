result = "";
for(x = 1; x <= 5; x++)
{
    for (y = 6 - x; y <= 5; y++)
    {
        result += "* ";
    }
    result += "\n";
}
console.log(result);