colors = ["white", "green", "red", "blue", "black"];

result = "";
for (i = 0; i < colors.length; i++)
{
    if (i == 0) {
        result += colors[i];
    } else {
    result += ", " + colors[i]
    }
}

console.log(result);