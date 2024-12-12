<?php

function mbtiTypeSelect($valueArray){ 
    switch($valueArray){
        case "ISTJ":
        $val = "
        Methodical and detail-oriented, focusing on accuracy and correctness.\n
        Dependable and responsible, following through on commitments and obligations.\n
        Practical and realistic, preferring concrete facts and evidence over abstract theories.\n
        Organized and structured, preferring order and clear guidelines.\n
        Patient and persistent, tackling tasks with diligence and perseverance.\n
        Reserved and private, valuing personal space and time for reflection.\n
        Traditional and loyal, respecting established norms and values";
            break;
        case "ISFJ":
            $val = "
        Compassionate and nurturing, caring deeply for others well-being.
        Supportive and loyal, going to great lengths to help and protect loved ones.
        Detail-oriented and meticulous, ensuring thoroughness and accuracy in tasks.
        Reliable and responsible, fulfilling duties with dedication and commitment.
        Modest and humble, preferring to work behind the scenes.
        Conscientious and organized, maintaining order and harmony in their environment.
        Patient and empathetic, listening attentively to others concerns.";
            break;
        case "INFJ":
            $val = "
        Insightful and empathetic, understanding complex emotions and motivations.
        Idealistic and visionary, striving for meaningful connections and deeper purpose.
        Creative and imaginative, exploring possibilities beyond the obvious.
        Determined and passionate, advocating for causes they believe in.
        Private and reserved, valuing deep, authentic relationships.
        Perceptive and intuitive, noticing subtle patterns and underlying meanings.
        Compassionate and supportive, offering empathy and understanding to others.";
            break;
        case "INTJ":
            $val = "
        Strategic and analytical, focusing on long-term goals and efficient solutions.
        Independent and decisive, trusting their own judgment and insights.
        Visionary and innovative, seeking new ideas and unconventional approaches.
        Logical and objective, prioritizing reason and evidence in decision-making.
        Goal-oriented and determined, pursuing excellence and mastery.
        Reserved and private, valuing introspection and intellectual pursuits.
        Confident and assertive, taking charge in challenging situations.";
            break;
        case "ISTP":
            $val = "
        Adaptable and resourceful, thriving in dynamic and hands-on environments.
        Analytical and logical, solving problems through practical, objective analysis.
        Independent and self-reliant, preferring autonomy and freedom.
        Calm and composed under pressure, handling emergencies with ease.
        Action-oriented and spontaneous, enjoying new experiences and challenges.
        Realistic and pragmatic, focusing on what works in the present moment.
        Observant and detail-oriented, noticing small changes and nuances.";
            break;
        case "ISFP":
            $val = 'Creative and artistic, expressing themselves through various forms of expression.
                    Sensitive and compassionate, caring deeply about others feelings.
                    Flexible and adaptable, embracing spontaneity and new experiences.
                    Harmonious and empathetic, seeking peace and understanding in relationships.
                    Reserved and private, valuing personal space and autonomy.
                    Gentle and caring, supporting others in practical and emotional ways.
                    Open-minded and accepting, appreciating diversity and individuality.';
            break;
        case "INFP":
            $val = 'Idealistic and passionate, driven by strong values and beliefs.
                    Creative and imaginative, exploring possibilities and alternative perspectives.
                    Empathetic and compassionate, connecting deeply with others emotions.
                    Authentic and genuine, valuing sincerity and honesty in relationships.
                    Flexible and adaptable, embracing change and growth.
                    Intuitive and insightful, understanding complex issues and human nature.
                    Reserved and private, preferring depth and meaning in connections.';
            break;
        case "INTP":
            $val = 'Analytical and curious, delving into complex ideas and theoretical concepts.
                    Independent and inventive, exploring innovative solutions and possibilities.
                    Logical and objective, prioritizing reason and logic in decision-making.
                    Open-minded and adaptable, welcoming new perspectives and information.
                    Creative and imaginative, generating novel ideas and insights.
                    Reflective and introspective, enjoying solitary intellectual pursuits.
                    Unconventional and nonconformist, questioning norms and traditions.';
            break;
        case "ESTP":
            $val = 'Energetic and action-oriented, thriving in fast-paced and dynamic  environments.
                    Practical and pragmatic, focusing on immediate results and tangible outcomes.
                    Resourceful and adaptable, quickly adjusting to changing circumstances.
                    Confident and assertive, taking charge and making decisions decisively.
                    Sociable and outgoing, enjoying interactions and new experiences.
                    Bold and risk-taking, embracing challenges and opportunities.
                    Realistic and grounded, dealing with situations in a straightforward manner.';
            break;
        case "ESFP":
            $val = 'Enthusiastic and expressive, bringing energy and joy to social interactions.
                    Empathetic and caring, connecting deeply with others emotions.
                    Spontaneous and playful, embracing fun and excitement in life.
                    Flexible and adaptable, enjoying new experiences and spontaneity.
                    Optimistic and positive, seeing the good in people and situations.
                    Charismatic and engaging, drawing others into their world.
                    Supportive and loyal, standing by friends and loved ones.';
            break;
        case "ENFP":
            $val = 'Creative and imaginative, generating innovative ideas and possibilities.
                    Enthusiastic and passionate, bringing energy and excitement to projects.
                    Empathetic and compassionate, understanding and supporting others emotions.
                    Open-minded and curious, exploring diverse interests and perspectives.
                    Spontaneous and adaptable, thriving in dynamic and changing environments.
                    Optimistic and inspiring, seeing potential and possibilities in every situation.
                    Sociable and friendly, enjoying meaningful connections and interactions.';
            break;
        case "ENTP":
            $val = 'Inventive and innovative, exploring new ideas and unconventional solutions.
                    Analytical and logical, evaluating situations objectively and critically.
                    Energetic and enthusiastic, diving into projects with enthusiasm and curiosity.
                    Open-minded and adaptable, welcoming new perspectives and challenges.
                    Charismatic and persuasive, influencing and inspiring others.
                    Resourceful and creative, finding inventive ways to solve problems.
                    Independent and nonconformist, questioning norms and exploring possibilities.';
            break;
        case "ESTJ":
            $val = 'Practical and efficient, focusing on productivity and results.
                    Organized and structured, creating order and clarity in tasks and projects.
                    Direct and decisive, making decisions based on logic and efficiency.
                    Responsible and reliable, fulfilling commitments and obligations.
                    Assertive and confident, taking charge and leading with authority.
                    Traditional and loyal, respecting established rules and hierarchies.
                    Action-oriented and goal-focused, pursuing objectives with determination.';
            break;
        case "ESFJ":
            $val = 'Warm and nurturing, caring deeply for others well-being and happiness.
                    Sociable and outgoing, enjoying social interactions and connections.
                    Supportive and loyal, standing by friends and loved ones through thick and thin.
                    Responsible and conscientious, taking on duties and roles with dedication.
                    Harmony-seeking and diplomatic, resolving conflicts and promoting unity.
                    Detail-oriented and organized, ensuring thoroughness and efficiency.
                    Empathetic and compassionate, understanding and responding to others  emotions.';
            break;
        case "ENFJ":
            $val = 'Charismatic and inspiring, motivating and influencing others toward shared goals.
                    Empathetic and compassionate, understanding and supporting others\' emotions.
                    Visionary and idealistic, envisioning possibilities for positive change.
                    Persuasive and diplomatic, navigating relationships and situations with finesse.
                    Sociable and outgoing, enjoying meaningful connections and interactions.
                    Responsible and reliable, taking on leadership roles with dedication.
                    Optimistic and encouraging, bringing out the best in people and situations.';
            break;
        case "ENTJ":
            $val = 'Strategic and goal-oriented, focusing on efficiency and results.
                    Confident and assertive, leading with authority and conviction.
                    Visionary and innovative, driving toward long-term objectives and solutions.
                    Logical and analytical, making decisions based on rational assessment.
                    Independent and decisive, trusting their own judgment and insights.
                    Determined and persistent, overcoming challenges with resilience.
                    Assertive and influential, inspiring and motivating others toward success.';
            break;
        default:
            $val = "Invalid MBTI type selected.";
            break;
    }

    return $val;
}

?>
