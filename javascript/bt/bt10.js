colors = ["white", "green", "red", "blue", "black"];
colors.splice(2,1);

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