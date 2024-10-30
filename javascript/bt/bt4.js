result = "";
for (x = 1; x <= 10; x++)
{
    if (x <= 5)
    {
        for (y = 6 - x; y <= 5; y++)
            {
                result += "* ";
            }
    } else {
        for (y = x ; y <=10; y++)
        {
            result += "* ";
        }
    }

    result += "\n";
}
console.log(result);